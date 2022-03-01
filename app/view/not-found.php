<head>
    <?php
    use Aijkl\AdShare\Components;
    $phrase = $phrase ?? null;
    $title = $phrase->notFoundTitle;
    Components::InnerHed($phrase->notFoundTitle);
    ?>
    <link href="/css/error.css" rel="stylesheet">
</head>
<body>
    <?php Components::GlobalNavigation() ?>
    <div class="wrap">
        <div class="not-found">
            <div class="not-found-title">
                <?= $title ?>
            </div>
        </div>
    </div>
    <?php Components::Footer() ?>
</body>
