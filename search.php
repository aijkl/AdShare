<head>
    <?php $title = "ホーム"; require 'head-inner-common.php'; ?>
    <title>Home</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="/js/component.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link href="/css/component.css" rel="stylesheet">
</head>
<body>
    <?php require 'global-navigation.php' ?>
    <div class="wrap">
        <div class="search-container">
            <div class="search-container-title">
                検索
            </div>

            <div class="search-inner-container">
                <div class="search-container-label">
                    状況
                </div>
                <i class="far fa-question-circle search-container-icon"></i><input class="search-input" type="text" placeholder="インターン前">
            </div>

            <div class="search-inner-container">
                <div class="search-container-label">
                    タグ
                </div>

                <!-- todo add tag inputにする　-->
                <i class="fas fa-tags search-container-icon"></i><input class="search-input" type="text" placeholder="タグ">
            </div>

            <div class="search-inner-container">
                <div class="search-container-label">
                    組織
                </div>

                <!-- todo add tag inputにする　-->
                <i class="fas fa-building search-container-icon"></i><input class="search-input" type="text" placeholder="組織">
            </div>
        </div>
    </div>
    <?php require 'footer.php' ?>
</body>
