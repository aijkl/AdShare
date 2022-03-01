<head>
    <?php
    use Aijkl\AdShare\Components;
    $phrase = $phrase ?? null;
    $title = $phrase->badRequestTitle;
    Components::InnerHed($phrase->badRequestTitle);
    ?>
    <link href="/css/error.css" rel="stylesheet">
</head>
<body>
    <?php Components::GlobalNavigation() ?>
    <div class="wrap">
        <div class="bad-request">
            <div class="bad-request-title">
                <?= $title ?>
            </div>
        </div>
    </div>
    <?php Components::Footer() ?>
</body>
