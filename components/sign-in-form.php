<?php
use Aijkl\AdShare\ConstParameters;
use Aijkl\AdShare\PhraseStore;

require_once "../vendor/autoload.php";

$phrase = PhraseStore::GetInstance()->GetPhrase("ja");
?>

<head>
    <?php $title = $phrase->LoginTitle; require 'head-inner-common.php';?>
    <link href="../css/destyle.css" rel="stylesheet">
    <link href="../css/sign-in.css" rel="stylesheet">
</head>
<body>
    <?php require 'global-navigation.php' ?>
    <div class="wrap">
        <div class="sign-in-box">
            <div class="sign-in-title"><?= $phrase->LoginTitle ?></div>
            <form action="" method="post">
                <label class="sign-in-label">
                    <input type="email" class="sign-in-input" name="<?= ConstParameters::Mail ?>" placeholder="<?= $phrase->MailPlaceHolder ?>">
                </label>
                <label class="sign-in-label">
                    <input type="password" class="sign-in-input" name="<?= ConstParameters::Password ?>" minlength="<?= ConstParameters::PasswordMin ?>" maxlength="<?= ConstParameters::PasswordMax ?>" placeholder="<?= $phrase->PasswordPlaceHolder ?>">
                </label>
                <label class="sign-in-submit">
                    <button id="sign-in-button">ログインする</button>
                </label>
            </form>
        </div>
    </div>
    <?php require 'footer.php' ?>
</body>
