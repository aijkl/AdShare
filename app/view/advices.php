<head>
    <?php
        use Aijkl\AdShare\Components;
        $phrase = $phrase ?? null;
        $userEntity = $userEntity ?? null;
        $adviceEntities = $adviceEntities ?? null;
        Components::InnerHed($phrase->homeTitle);
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
            <article class="message-container">
                <section class="profile-container">
                    <img class="user-icon" src="debug-assets/user-icon3.jpg" alt="user-icon">
                    <a class="user-name">矢田朋久</a>
                </section>
                <section class="message-text-section-container">
                    <p class="message-text-section-title">対象</p>
                    <p>
                        就活生
                    </p>
                </section>
                <section class="message-text-section-container">
                    <p>
                        インターンに行ったときにOBの方と喋るときに、学校の愚痴に乗ってはいけない<br>
                        ○○の授業って面倒だよね！？って言われても否定しないと落ちる
                    </p>
                </section>
                <section class="message-footer-element-container">
                    <div class="message-footer-element">
                        <i class="far fa-thumbs-up like-count"></i>999999
                    </div>
                    <div class="message-footer-element">
                        <i class="fas fa-user message-footer-element"></i><span>HAL</span>
                    </div>
                    <div class="message-footer-element">
                        <!-- todo convert to a Tag -->
                        <i class="fas fa-tag message-footer-element"></i><!--
                            --><a href="#" class="tag">HAL</a><a href="#" class="tag">回避</a>
                    </div>
                </section>
            </article>
        </div>
    </div>
    <?php Components::Footer() ?>
</body>
