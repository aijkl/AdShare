<?php
use Aijkl\AdShare\ConstParameters;
use Aijkl\AdShare\PhraseStore;

$phrase = PhraseStore::getInstance()->getPhrase("ja");
?>

<head>
    <?php $title = $phrase->signUpTitle; require 'head-inner-common.php';?>
    <link href="/css/destyle.css" rel="stylesheet">
    <link href="/css/auth.css" rel="stylesheet">
</head>
<body>
    <?php require 'global-navigation.php' ?>
    <div class="wrap">
        <div class="auth-box">
            <div class="auth-title"><?= $phrase->signUpTitle?></div>
            <div id="api-error" class="api-error"></div>
            <label class="auth-label">
                <input id="mail" type="email" class="auth-input" placeholder="<?= $phrase->mailPlaceHolder ?>">
                <div id="mail-validate-message" class="auth-error"></div>
            </label>
            <label class="auth-label">
                <input id="password" type="password" class="auth-input" placeholder="<?= $phrase->passwordPlaceHolder ?>">
                <div id="password-validate-message" class="auth-error"></div>
            </label>
            <label class="auth-label">
                <input id="name" type="text" class="auth-input" placeholder="<?= $phrase->namePlaceHolder ?>">
                <div id="name-validate-message" class="auth-error"></div>
            </label>
            <label class="auth-label"><div class="sign-in-remember-me"><?= $phrase->rememberMeText ?></div>
                <input id="remember-me" type="checkbox" class="sign-in-checkbox">
                <div id="password-validate-message" class="auth-error"></div>
            </label>
            <label class="auth-button">
                <button id="auth-button"><?= $phrase->signUpTitle ?></button>
            </label>
        </div>
    </div>

    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js"
            data-main="/js/sign-up.js"
            integrity="sha512-c3Nl8+7g4LMSTdrm621y7kf9v3SDPnhxLNhcjFJbKECVnmZHTdo+IRO05sNLTH/D3vA6u1X32ehoLC7WFVdheg=="
            crossorigin="anonymous"
    ></script>

    <?php require 'footer.php' ?>
</body>
