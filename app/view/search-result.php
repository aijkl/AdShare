<head>
    <?php
        use Aijkl\AdShare\Components;
        $phrase = $phrase ?? null;
        $userEntity = $userEntity ?? null;
        $adviceUIModels = $adviceUIModels ?? null;
        Components::innerHead($phrase->searchTitle);
    ?>
    <link href="/css/component.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="/js/component.js"></script>
</head>
<body>
    <?php Components::globalNavigation($userEntity) ?>
    <div class="wrap">
        <?php Components::advices($phrase,$adviceUIModels) ?>
    </div>
    <?php Components::footer() ?>
</body>
