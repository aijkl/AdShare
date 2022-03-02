<?php
    use Aijkl\AdShare\Components;

    $phrase = $phrase ?? null;
    $adviceUIModels = $adviceUIModels ?? null;
?>
<div class="advice-container">
    <div class="recent-post-title"><?= $phrase->recentPostsText ?></div>
    <?php foreach ($adviceUIModels as $adviceUIModel): ?>
        <article class="message-container">
            <section class="profile-container">
                <img class="user-icon" src="/image/<?= $adviceUIModel->userProfileEntity->iconImageId ?>" alt="user-icon">
                <a class="user-name"><?= $adviceUIModel->userProfileEntity->userName ?></a>
            </section>
            <section class="message-text-section-container">
                <p class="message-text-section-title"><?= $phrase->targetLabel ?></p>
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
                <?php if($adviceUIModel->adviceEntity->tags != null): ?>
                <div class="message-footer-element">
                    <i class="fas fa-tag message-footer-element"></i>
                    <?php foreach ($adviceUIModel->adviceEntity->tags as $tag): ?>
                        <a href="#" class="tag"><?= $tag; ?></a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </section>
        </article>
    <?php endforeach; ?>
</div>
