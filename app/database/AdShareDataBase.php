<?php

namespace Aijkl\AdShare;
use Ginq;
use PDO;
use PDOException;

class AdShareDataBase
{
    // todo 外部キーの設定をする
    // memo PHPの例外の仕様がわからん..再スローでスタックとレース壊れないの？
    // todo Sql Builderの導入
    private PDO $database;
    function __construct(string $dsn,string $userName,string $password)
    {
        $this->database = new PDO($dsn,$userName,$password);
        $this->database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->database->exec("SET SESSION TRANSACTION ISOLATION LEVEL READ COMMITTED");
    }

    /**
     * @throws UserNotFoundException
     */
    function signIn(SignInRequest $signInRequest) : TokenEntity
    {
        $sqlBuilder = $this->database->prepare("SELECT * FROM users WHERE users.mail = :mail AND users.password_sha256 = :password_sha256");
        $sqlBuilder->bindValue(":mail",$signInRequest->mail);
        $sqlBuilder->bindValue(":password_sha256",$signInRequest->passwordSha256);
        $sqlBuilder->execute();
        $result = $sqlBuilder->fetch(PDO::FETCH_ASSOC);
        if($result == false)
        {
            throw new UserNotFoundException();
        }

        $user = EntityConverter::ConvertToUserEntity($result);
        return $this->createToken($user->id);
    }

    /**
     * @throws UserExistsException
     */
    function signUp(SignUpRequest $signUpRequest) : TokenEntity
    {
        if($this->exitsUser($signUpRequest->mail))
        {
            throw new UserExistsException();
        }

        $this->database->beginTransaction();
        try
        {
            $id = hash("sha256",strval(rand(PHP_INT_MIN,PHP_INT_MAX)));
            $sqlBuilder = $this->database->prepare("INSERT INTO users (users.id,users.name,users.mail,users.password_sha256) VALUES (:id,:name,:mail,:password_sha256);");
            $sqlBuilder->bindValue(":id",$id);
            $sqlBuilder->bindValue(":name",$signUpRequest->name);
            $sqlBuilder->bindValue(":mail",$signUpRequest->mail);
            $sqlBuilder->bindValue(":password_sha256",$signUpRequest->passwordHash256);
            $sqlBuilder->execute();
            $sqlBuilder->fetch(PDO::FETCH_ASSOC);
            $tokenEntity = $this->createToken($id);
            $this->database->commit();
            return $tokenEntity;
        }
        catch (PDOException $exception)
        {
            $this->database->rollBack();
            throw $exception;
        }
    }

    /**
     * @throws UserNotFoundException
     */
    function getUser(string $userId) : UserEntity
    {
        $sqlBuilder = $this->database->prepare("SELECT * FROM users WHERE users.id = :userId");
        $sqlBuilder->bindValue(":userId",$userId);
        $sqlBuilder->execute();
        $result = $sqlBuilder->fetch(PDO::FETCH_ASSOC);
        if($result == false)
        {
            throw new UserNotFoundException();
        }

        return EntityConverter::ConvertToUserEntity($result);
    }

    function exitsUser(string $mail) : bool
    {
        $sqlBuilder = $this->database->prepare("SELECT * FROM users WHERE users.mail = :mail");
        $sqlBuilder->bindValue(":mail",$mail);
        $sqlBuilder->execute();
        return $sqlBuilder->fetch(PDO::FETCH_ASSOC) == true;
    }

    function validateToken(string $token): bool
    {
        $sqlBuilder = $this->database->prepare("SELECT * FROM tokens WHERE tokens.token = :token AND tokens.enable");
        $sqlBuilder->bindValue(":token",$token);
        $sqlBuilder->execute();

        return $sqlBuilder->execute() != null;
    }

    /**
     * @throws TokenNotFoundException
     * @throws UserNotFoundException
     */
    function getUserFromToken(string $token): UserEntity
    {
        $sqlBuilder = $this->database->prepare("SELECT * FROM tokens WHERE tokens.token = :token AND tokens.enable");
        $sqlBuilder->bindValue(":token",$token);
        $sqlBuilder->execute();

        $result = $sqlBuilder->fetch(PDO::FETCH_ASSOC);
        if($result == false)
        {
            throw new TokenNotFoundException();
        }
        return $this->getUser($result["user_id"]);
    }

    function createAdvice(string $body,string $target,string $author_id,array $tags = null,bool $valid = true)
    {
        $this->database->beginTransaction();
        try
        {
            $sqlBuilder = $this->database->prepare("INSERT INTO advices (body,target, author_id,valid) VALUES (:body,:target,:author_id,:valid);");
            $sqlBuilder->bindValue(":text",$body);
            $sqlBuilder->bindValue(":target",$target);
            $sqlBuilder->bindValue(":author_id",$author_id);
            $sqlBuilder->bindValue(":valid",$valid);
            $sqlBuilder->execute();
            $adviceId = $this->database->lastInsertId();

            if($tags != null)
            {
                foreach ($tags as $tag)
                {
                    $this->createTag($adviceId,$tag);
                }
            }

            $this->database->commit();
        }
        catch (PDOException $exception)
        {
            $this->database->rollBack();
            throw $exception;
        }
    }

    function searchAdvice(string $target,string $body,array $tags)
    {
        $tagsSql = "";
        for ($i = 0; $i < count($tags); $i++)
        {
            $tagsSql .=  "OR tags.text = :tag${$i}";
        }
        $sql = $this->database->prepare("
         SELECT *
         FROM advices 
         LEFT JOIN tags
         ON advices.id = tags.advice_id
         WHERE advices.body LIKE '%:body%' OR advices.target LIKE '%:target% ${$tagsSql}' 
         GROUP BY advices.id;
         ");
        $sql->bindValue(":target",$target);
        $sql->bindValue(":body",$body);
        $sql->bindValue(":target",$body);
        for($i = 0;$i < count($tags); $i++)
        {
            $sql->bindValue(`:tag${$i}`,$tags[$i]);
        }

        $sql->execute();
        $sql->fetchAll();
    }

    function createTag(string $adviceId,string $text)
    {
        $sqlBuilder = $this->database->prepare("INSERT INTO tags (advice_id,text) VALUES (:advice_id,:text)");
        $sqlBuilder->bindValue(":advice_id",$adviceId);
        $sqlBuilder->bindValue(":text",$text);
        $sqlBuilder->execute();
    }

    /**
     * @throws AdviceNotFoundException
     */
    function getAdvice(string $id): AdviceEntity
    {
        $sqlBuilder = $this->database->prepare("SELECT * FROM advices WHERE id = :id");
        $sqlBuilder->bindValue(":id",$id);
        $sqlBuilder->execute();
        $result = $sqlBuilder->fetch(PDO::FETCH_ASSOC);
        if($result === false)
        {
            throw new AdviceNotFoundException();
        }
        return new AdviceEntity($result['id'],$result['body'],$result['target'],$result['likes'],$result['valid']);
    }

    private function createToken(string $userId): TokenEntity
    {
        $token = hash("sha256",strval(rand(PHP_INT_MIN,PHP_INT_MAX)));
        $sqlBuilder = $this->database->prepare("INSERT INTO tokens (tokens.user_id,tokens.token,tokens.enable) VALUES(:user_id,:token,true);");
        $sqlBuilder->bindValue(":user_id",$userId);
        $sqlBuilder->bindValue(":token",$token);
        $sqlBuilder->execute();

        $tokenEntity = new TokenEntity();
        $tokenEntity->token = $token;
        $tokenEntity->userId = $userId;
        return $tokenEntity;
    }
}