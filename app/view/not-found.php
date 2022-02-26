<head>
    <?php
    use Aijkl\AdShare\Components;
    $phrase = $phrase ?? null;
    $title = $phrase->notFoundTitle;
    $userEntity = $userEntity ?? null;
    Components::InnerHed($phrase->notFoundTitle);
    ?>
    <link href="/css/not-found.css" rel="stylesheet">
</head>
<body>
    <?php Components::GlobalNavigation($userEntity) ?>
    <div class="wrap">
        <div class="not-found">
            <div class="not-found-title">
                <?= $title ?>
            </div>
        </div>
    </div>
    <?php Components::Footer() ?>
</body>
