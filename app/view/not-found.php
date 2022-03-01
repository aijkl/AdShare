<head>
    <?php
    use Aijkl\AdShare\Components;
    $phrase = $phrase ?? null;
    $title = $phrase->notFoundTitle;
    Components::innerHead($phrase->notFoundTitle);
    ?>
    <link href="/css/error.css" rel="stylesheet">
</head>
<body>
    <?php Components::globalNavigation() ?>
    <div class="wrap">
        <div class="not-found">
            <div class="not-found-title">
                <?= $title ?>
            </div>
        </div>
    </div>
    <?php Components::footer() ?>
</body>
