<head>
    <?php
        use Aijkl\AdShare\Components;
        $phrase = $phrase ?? null;
        $userEntity = $userEntity ?? null;
        $adviceUIModels = $adviceUIModels ?? null;
        Components::InnerHed($phrase->searchTitle);
    ?>
    <link href="/css/component.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="/js/component.js"></script>
</head>
<body>
    <?php Components::GlobalNavigation($userEntity) ?>
    <div class="wrap">
        <div class="advice-container">
            <?php foreach ($adviceUIModels as $adviceUIModel): ?>
                <article class="message-container">
                    <section class="profile-container">
                        <img class="user-icon" src="/image/<?= $adviceUIModel->userProfileEntity->iconImageId ?>" alt="user-icon">
                        <a class="user-name"><?= $adviceUIModel->userProfileEntity->userName ?></a>
                    </section>
                    <section class="message-text-section-container">
                        <p class="message-text-section-title"><?= $phrase->targetText ?></p>
                        <p>
                            <?= $adviceUIModel->adviceEntity->target ?>
                        </p>
                    </section>
                    <section class="message-text-section-container">
                        <p>
                            <?= $adviceUIModel->adviceEntity->body ?>
                        </p>
                    </section>
                    <section class="message-footer-element-container">
                        <div class="message-footer-element">
                            <i class="far fa-thumbs-up like-count"></i><?= $adviceUIModel->adviceEntity->likes ?>
                        </div>
                        <div class="message-footer-element">
                            <i class="fas fa-tag message-footer-element"></i><!--
                            -->
                            <?php foreach ($adviceUIModel->adviceEntity->tags as $tag): ?>
                                <a href="#" class="tag"><?= $tag; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </section>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
    <?php Components::Footer() ?>
</body>
