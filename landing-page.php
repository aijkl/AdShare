<head>
    <?php $title = "ようこそ"; require 'head-inner-common.php';?>
    <!-- lp -->
    <link href="css/component.css" rel="stylesheet">
    <link href="css/landing-page.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <link href="css/component.css" rel="stylesheet">
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
            <img class="catch-copy-img" src="debug-assets/lp2.png">
            <script src="js/landing-page.js"></script>
        </div>
    </div>
    <?php require 'footer.php' ?>
</body>
