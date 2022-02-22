<?php

use Aijkl\AdShare\SignInRequest;

class AdShareDataBase
{
    private PDO $database;
    function __construct(string $dsn,string $userName,string $password)
    {
        $this->database = new PDO($dsn,$userName,$password);
    }

    /**
     * @throws UserNotFoundException
     */
    function SignIn(SignInRequest $signInRequest) : TokenEntity
    {
        $sqlBuilder = $this->database->prepare("SELECT * FROM users WHERE users.mail = :mail AND users.password_sha256 = :password_sha256");
        $sqlBuilder->bindValue(":mail",$signInRequest->Mail);
        $sqlBuilder->bindValue(":password_sha256",$signInRequest->Password256);
        $sqlBuilder->execute();
        $result = $sqlBuilder->fetch(PDO::FETCH_ASSOC);
        if(isset($result) == false)
        {
            throw new UserNotFoundException();
        }

        $user = EntityConverter::ConvertToUserEntity($result);
        return $this->CreateToken($user->Id);
    }

    function ValidateToken(string $userId,string $token): bool
    {
        $sqlBuilder = $this->database->prepare("SELECT * FROM tokens WHERE tokens.user_id = :user_id AND tokens.token = :token AND tokens.enable");
        $sqlBuilder->bindValue(":user_id",$userId);
        $sqlBuilder->bindValue("token",$token);
        $sqlBuilder->execute();

        return $sqlBuilder->execute() != null;
    }

    private function CreateToken(string $userId): TokenEntity
    {
        $token = hash("sha256",strval(rand(PHP_INT_MIN,PHP_INT_MAX)));
        $sqlBuilder = $this->database->prepare("INSERT INTO tokens (user_id,token) VALUES(':user_id',':token')");
        $sqlBuilder->bindValue(":user_id",$userId);
        $sqlBuilder->bindValue("token",$token);
        $sqlBuilder->execute();

        $tokenEntity = new TokenEntity();
        $tokenEntity->Token = $token;
        $tokenEntity->UserId = $userId;
        return $tokenEntity;
    }
}