<head>
    <?php
    use Aijkl\AdShare\Components;
    $phrase = $phrase ?? null;
    $userEntity = $userEntity ?? null;
    Components::innerHead($phrase->createAdviceTitle);
    ?>
    <link href="/css/component.css" rel="stylesheet">
</head>
<body>
    <?php Components::globalNavigation($userEntity) ?>
    <div class="wrap">
        <div class="advice-form-parent">
            <div class="advice-form-container">
                <div class="advice-container-title">
                    <?= $phrase->createAdviceTitle ?>
                </div>
                <div id="validate-message" class="error"></div>

                <div class="advice-inner-container">
                    <label class="advice-container-label"><?= $phrase->targetLabel ?>
                        <i class="far fa-question-circle advice-container-icon"></i><input id="search-target" class="advice-input" type="text" placeholder=<?= $phrase->targetPlaceHolder ?>>
                    </label>
                    <div id="target-validate-message" class="error"></div>
                </div>

                <div class="advice-inner-container">
                    <label class="advice-container-label"><?= $phrase->tagLabel ?>
                        <i class="fas fa-tags search-container-icon"></i><input id="search-tag" class="advice-input" type="text" placeholder=<?= $phrase->tagPlaceHolder ?>>
                    </label>
                    <div id="tag-validate-message" class="error"></div>
                </div>

                <div class="advice-inner-container">
                    <label class="advice-container-label"><?= $phrase->bodyLabel ?>
                        <i class="fas fa-comment search-container-icon"></i><input id="search-body" class="advice-input" type="text" placeholder=<?= $phrase->bodyPlaceHolder ?>>
                    </label>
                    <div id="body-validate-message" class="error"></div>
                </div>

                <label class="advice-button">
                    <button id="advice-button"><?= $phrase->createAdviceTitle ?></button>
                </label>
                <script
                        src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js"
                        data-main="/js/search.js"
                        integrity="sha512-c3Nl8+7g4LMSTdrm621y7kf9v3SDPnhxLNhcjFJbKECVnmZHTdo+IRO05sNLTH/D3vA6u1X32ehoLC7WFVdheg=="
                        crossorigin="anonymous"
                ></script>
            </div>
        </div>
    </div>
    <?php Components::footer() ?>
</body>
