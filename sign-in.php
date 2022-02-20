<?php
use Aijkl\AdShare\ConstParameters;
use Aijkl\AdShare\PhraseStore;

// todo fix hard code
$phrase = Aijkl\AdShare\PhraseStore::GetInstance()->GetPhrase("ja");
?>

<head>
    <?php $title = "ようこそ"; require 'head-inner-common.php';?>
    <link href="css/destyle.css" rel="stylesheet">
    <link href="css/sign-in.css" rel="stylesheet">
</head>
<body>
    <?php require 'global-navigation.php' ?>
    <div class="wrap">
        <div class="sign-in-box">
            <div class="sign-in-title">ログイン</div>
            <label>Name:
                <input type="text" name="<?= ConstParameters::Name ?>" placeholder="<?= $phrase->NamePlaceHolder ?>" minlength="<?= ConstParameters::NameMin ?>" maxlength="<?= ConstParameters::NameMax ?>">
            </label>
            <label>Mail:
                <input type="email" name="<?= ConstParameters::Mail ?>" placeholder="<?= $phrase->MailPlaceHolder ?>">
            </label>
            <label>Password:
                <input type="password" name="<?= ConstParameters::Password ?>" minlength="<?= ConstParameters::PasswordMin ?>" maxlength="<?= ConstParameters::PasswordMax ?>" placeholder="<?= $phrase->PasswordPlaceHolder ?>">
            </label>
        </div>
    </div>
    <?php require 'footer.php' ?>
</body>
