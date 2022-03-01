<head>
    <?php
    use Aijkl\AdShare\Components;
    $phrase = $phrase ?? null;
    $userEntity = $userEntity ?? null;
    Components::innerHead($phrase->searchTitle);
    ?>
    <link href="/css/component.css" rel="stylesheet">
</head>
<body>
    <?php Components::globalNavigation($userEntity) ?>
    <div class="wrap">
        <?php Components::search($phrase,$userEntity) ?>
    </div>
    <?php Components::footer() ?>
</body>
