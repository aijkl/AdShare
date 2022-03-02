<?php
$userEntity = $userEntity ?? null;
?>

<nav class="global-navigation">
    <div class="global-navigation-inner">
        <div class="global-navigation-title"><a href="/index">AdShare</a></div>
        <ul class="global-navigation-list" style="margin-right: 30%">
            <!--<li class="global-navigation-list-item"><input class="global-navigation-input" type="text" placeholder="キーワードを入力"></li>-->
            <li class="global-navigation-list-item"><a href="/index">ホーム</a></li>
            <li class="global-navigation-list-item"><a href="/search/advice">詳細検索</a></li>
            <li class="global-navigation-list-item"><a href="/create/advice">投稿</a></li>
<!--            <li class="global-navigation-list-item"><a href="popular">人気</a></li>-->
            <?php if ($userEntity == null): ?>
                <li class="global-navigation-list-item"><a href="/auth/sign-in">ログイン</a></li>
                <li class="global-navigation-list-item"><a href="/auth/sign-up">新規登録</a></li>
            <?php endif; ?>
        </ul>
        <?php if ($userEntity != null): ?>
            <a class="global-navigation-user"><?= $userEntity->name ?></a>
        <?php endif; ?>
    </div>
</nav>