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
        <div class="search-container">
            <div class="search-container-title">
                検索
            </div>

            <div class="search-inner-container">
                <label class="search-container-label">状況
                    <i class="far fa-question-circle search-container-icon"></i><input class="search-input" type="text" placeholder="インターン前">
                </label>
            </div>

            <div class="search-inner-container">
                <label class="search-container-label">タグ
                    <i class="fas fa-tags search-container-icon"></i><input class="search-input" type="text" placeholder="タグ">
                </label>
            </div>

            <div class="search-inner-container">
                <label class="search-container-label">組織
                    <i class="fas fa-building search-container-icon"></i><input class="search-input" type="text" placeholder="組織">
                </label>
            </div>
        </div>
    </div>
    <?php Components::Footer() ?>
</body>
