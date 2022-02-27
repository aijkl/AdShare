<head>
    <?php
    use Aijkl\AdShare\Components;
    $phrase = $phrase ?? null;
    $userEntity = $userEntity ?? null;
    Components::InnerHed($phrase->searchTitle);
    ?>
    <title>Home</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="/js/component.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link href="/css/component.css" rel="stylesheet">
</head>
<body>
    <?php Components::GlobalNavigation($userEntity) ?>
    <div class="wrap">
        <!-- todo cssの改善 -->
        <!-- todo フレーズファイルへ移動  -->
        <div class="search-container">
            <div class="search-container-title">
                検索
            </div>
            <div id="validate-message" class="error"></div>

            <div class="search-inner-container">
                <label class="search-container-label">対象
                    <i class="far fa-question-circle search-container-icon"></i><input id="search-target" class="search-input" type="text" placeholder="対象">
                </label>
                <div id="target-validate-message" class="error"></div>
            </div>

            <div class="search-inner-container">
                <label class="search-container-label">タグ
                    <i class="fas fa-tags search-container-icon"></i><input id="search-tag" class="search-input" type="text" placeholder="タグ">
                </label>
                <div id="tag-validate-message" class="error"></div>
            </div>

            <div class="search-inner-container">
                <label class="search-container-label">本文
                    <i class="fas fa-comment search-container-icon"></i><input id="search-body" class="search-input" type="text" placeholder="対象">
                </label>
                <div id="body-validate-message" class="error"></div>
            </div>

            <label class="search-button">
                <button id="search-button"><?= $phrase->searchTitle ?></button>
            </label>
            <script
                    src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js"
                    data-main="/js/search.js"
                    integrity="sha512-c3Nl8+7g4LMSTdrm621y7kf9v3SDPnhxLNhcjFJbKECVnmZHTdo+IRO05sNLTH/D3vA6u1X32ehoLC7WFVdheg=="
                    crossorigin="anonymous"
            ></script>
        </div>
    </div>
    <?php Components::Footer() ?>
</body>
