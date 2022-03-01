<head>
    <?php $title = "ホーム"; require '../../app/components/head-inner-common.php'; ?>
    <title>Home</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="/js/component.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link href="/css/component.css" rel="stylesheet">
</head>
<body>
    <?php require '../../app/components/global-navigation.php' ?>
    <div class="wrap">
        <div class="popular-main-container">
            <div class="mini-categories-list-container">
                <div class="mini-categories-container">
                    <p class="mini-categories-container-title">週間ランキング</p>
                    <div class="mini-category-container-inner">
                        <ul>
                            <li class="mini-category-container">
                                <a href="#">
                                    <p class="mini-category-title">向上</p>
                                    <p class="mini-category-likes">300 回</p>
                                </a>
                            </li>
                            <li class="mini-category-container">
                                <a href="#">
                                    <p class="mini-category-title">後悔</p>
                                    <p class="mini-category-likes">300 回</p>
                                </a>
                            </li>
                            <li class="mini-category-container">
                                <a href="#">
                                    <p class="mini-category-title">就活</p>
                                    <p class="mini-category-likes">300 回</p>
                                </a>
                            </li>
                            <li class="mini-category-container">
                                <a href="#">
                                    <p class="mini-category-title">金銭</p>
                                    <p class="mini-category-likes">300 回</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mini-categories-container">
                    <p class="mini-categories-container-title">年間ランキング</p>
                    <div class="mini-category-container-inner">
                        <ul>
                            <li class="mini-category-container">
                                <a>
                                    <p class="mini-category-title">向上</p>
                                    <p class="mini-category-likes">300 likes</p>
                                </a>
                            </li>
                            <li class="mini-category-container">
                                <a>
                                    <p class="mini-category-title">後悔</p>
                                    <p class="mini-category-likes">300 likes</p>
                                </a>
                            </li>
                            <li class="mini-category-container">
                                <a>
                                    <p class="mini-category-title">就活</p>
                                    <p class="mini-category-likes">300 likes</p>
                                </a>
                            </li>
                            <li class="mini-category-container">
                                <a>
                                    <p class="mini-category-title">就活</p>
                                    <p class="mini-category-likes">300 likes</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="popular-timeline-container">
                <article class="message-container">
                    <section class="profile-container">
                        <img class="user-icon" src="../../www/static/user-icon3.jpg" alt="user-icon">
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
                <article class="message-container">
                    <section class="profile-container">
                        <img class="user-icon" src="../../www/static/user-icon2.jpg" alt="user-icon">
                        <a class="user-name">みんとこ</a>
                    </section>
                    <section class="message-text-section-container">
                        <p class="message-text-section-title">対象</p>
                        <p>
                            HALの学生
                        </p>
                    </section>
                    <section class="message-text-section-container">
                        <p>
                            Mode学園の学学連携には行かない方がいい<br>
                            ヘアスタイルの知識がある前提なので、初心者には向いていない
                        </p>
                    </section>
                    <section class="message-footer-element-container">
                        <div class="message-footer-element">
                            <i class="far fa-thumbs-up like-count"></i>34
                        </div>
                        <div class="message-footer-element">
                            <i class="fas fa-user message-footer-element"></i><span>HAL</span>
                        </div>
                        <div class="message-footer-element">
                            <!-- todo convert to a Tag -->
                            <i class="fas fa-tag message-footer-element"></i><!--
                            --><a href="#" class="tag">HAL</a><a href="#" class="tag">後悔</a><a href="#" class="tag">回避</a>
                        </div>
                    </section>
                </article>
                <article class="message-container">
                    <section class="profile-container">
                        <img class="user-icon" src="../../www/static/user-icon.jpg" alt="user-icon">
                        <a class="user-name">Orange</a>
                    </section>
                    <section class="message-text-section-container">
                        <p class="message-text-section-title">対象</p>
                        <p>
                            基本情報受験者
                        </p>
                    </section>
                    <section class="message-text-section-container">
                        <div class="message-image-slider">
                            <img class="message-image" src="../../www/static/book.jpg">
                            <img class="message-image" src="../../www/static/book2.jpg">
                            <img class="message-image" src="../../www/static/book2.jpg">
                            <img class="message-image" src="../../www/static/book2.jpg">
                        </div>
                        <p>
                            「出るとこだけ！」だけでは分かりにくい。<br>
                            「ふっくぜみのデータ構造とアルゴリズム」がわかりやすい
                        </p>
                    </section>
                    <section class="message-footer-element-container">
                        <div class="message-footer-element">
                            <i class="far fa-thumbs-up like-count"></i>34
                        </div>
                        <div class="message-footer-element">
                            <i class="fas fa-user message-footer-element"></i><span>HAL</span>
                        </div>
                        <div class="message-footer-element">
                            <!-- todo convert to a Tag -->
                            <i class="fas fa-tag message-footer-element"></i><!--
                            --><a href="#" class="tag">HAL</a><a href="#" class="tag">後悔</a><a href="#" class="tag">回避</a>
                        </div>
                    </section>
                </article>
                <article class="message-container">
                    <section class="profile-container">
                        <img class="user-icon" src="../../www/static/user-icon.jpg" alt="user-icon">
                        <a class="user-name">Orange</a>
                    </section>
                    <section class="message-text-section-container">
                        <p class="message-text-section-title">対象</p>
                        <p>
                            夏休みの1年生
                        </p>
                    </section>
                    <section class="message-text-section-container">
                        <p>
                            夏休みを無駄にしてはいけない<br>
                            夏休みに基本情報の勉強をしなかったので勉強が忙しかった<br>
                            あたりまえだけど勉強は計画的にすること、夏休みは基本情報！
                        </p>
                    </section>
                    <section class="message-footer-element-container">
                        <div class="message-footer-element">
                            <i class="far fa-thumbs-up like-count"></i>38
                        </div>
                        <div class="message-footer-element">
                            <i class="fas fa-user message-footer-element"></i><span>HAL</span>
                        </div>
                        <div class="message-footer-element">
                            <!-- todo convert to a Tag -->
                            <i class="fas fa-tag message-footer-element"></i><!--
                            --><a href="#" class="tag">HAL</a><a href="#" class="tag">後悔</a><a href="#" class="tag">向上</a>
                        </div>
                    </section>
                </article>
            </div>
        </div>
    </div>
    <?php require '../../app/components/footer.php' ?>
</body>
