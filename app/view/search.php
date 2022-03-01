<?php
use Aijkl\AdShare\Components;
$phrase = $phrase ?? null;
$userEntity = $userEntity ?? null;
Components::innerHead($phrase->searchTitle);
?>
<div class="search-container-parent">
    <div class="search-container">
        <div class="search-container-title">
            <?= $phrase->searchTitle ?>
        </div>
        <div id="validate-message" class="error"></div>

        <div class="search-inner-container">
            <label class="search-container-label"><?= $phrase->targetLabel ?>
                <i class="far fa-question-circle search-container-icon"></i><input id="search-target" class="search-input" type="text" placeholder=<?= $phrase->targetPlaceHolder ?>>
            </label>
            <div id="target-validate-message" class="error"></div>
        </div>

        <div class="search-inner-container">
            <label class="search-container-label"><?= $phrase->tagLabel ?>
                <i class="fas fa-tags search-container-icon"></i><input id="search-tag" class="search-input" type="text" placeholder=<?= $phrase->tagPlaceHolder ?>>
            </label>
            <div id="tag-validate-message" class="error"></div>
        </div>

        <div class="search-inner-container">
            <label class="search-container-label"><?= $phrase->bodyLabel ?>
                <i class="fas fa-comment search-container-icon"></i><input id="search-body" class="search-input" type="text" placeholder=<?= $phrase->bodyPlaceHolder ?>>
            </label>
            <div id="body-validate-message" class="error"></div>
        </div>

        <label class="search-button">
            <button id="search-button"><?= $phrase->searchTitle ?></button>
        </label>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js"
            data-main="/js/search.js"
            integrity="sha512-c3Nl8+7g4LMSTdrm621y7kf9v3SDPnhxLNhcjFJbKECVnmZHTdo+IRO05sNLTH/D3vA6u1X32ehoLC7WFVdheg=="
            crossorigin="anonymous"
        ></script>
    </div>
</div>
