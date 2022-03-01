<head>
    <?php
    use Aijkl\AdShare\AdShareHelper;
    use Aijkl\AdShare\PhraseStore;
    $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());
    $title = $phrase->landingPageTitle;
    require 'head-inner-common.php';
    ?>
    <!-- lp -->
    <link href="/css/component.css" rel="stylesheet">
    <link href="/css/landing-page.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <link href="/css/component.css" rel="stylesheet">
    <link href="/css/auth.css" rel="stylesheet">
</head>
<body>
    <?php require 'global-navigation.php' ?>
    <div class="wrap">
        <div class="lp-container">
            <div class="catch-copy-container">
                <div class="catch-copy-title">
                    AdShare<br>
                    <p class="catch-copy-container-low">
                        アドバイス共有 SNS
                    </p>
                </div>

                <div id="catch-copy-string">
                    <p>他人の失敗から学ぶ</p>
                </div>
                <span id="catch-copy-typed" class="catch-copy-type"></span>

                <p class="catch-copy-container-low">
                    就活中にするべきこと<br>
                    テレワーク中にすべきこと<br>
                    境遇に合わせたアドバイスを行います
                </p>
            </div>
            <a class="sign-in-button" href="/auth/sign-up"><?= $phrase->signUpTitle ?></a>
        </div>
    </div>
    <script src="/js/landing-page.js"></script>
    <?php require 'footer.php' ?>
</body>
