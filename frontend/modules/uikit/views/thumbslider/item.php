<?php

use trk\uikit\Uikit;

if (!empty($item['category'])) {
    $categoryColor = '#000';
    if (!empty($item['category_color'])) {
        $categoryColor = $item['category_color'];
    }
}


$titleThumb = !empty($item['thumbcontent']) ? base64_encode($item['thumbcontent']) : base64_encode($item['content']);
$buttonLabel = !empty($item['buttonLabel']) ? $item['buttonLabel'] : 'Scopri di più';
?>
<?php
if (!$data['hidethumb']) {
?>
    <li class="lSliderItem sliderItemThumb" data-link="<?= $item['link'] ?>" data-thumb="<?= $item['image'] ?>" data-caption="<?= $titleThumb ?>" data-category="<?= $item['category'] ?>" data-category-color="<?= $categoryColor ?>">

    <?php
} else {
    ?>
    <li class="lSliderItem sliderItemDot">
    <?php }
    ?>
    <img src="<?= $item['image'] ?>" alt="<?= $item['image_alt'] ?>" />
    <div class="caption">
        <div class="el-content container text-white">
            <?php
            if (!empty($item['link'])) {
            ?>
                <div>
                    <div class="h1">
                        <a href="<?= $item['link'] ?>" title="Vai alla pagina <?= strip_tags($item['content']) ?>">
                            <?= $item['content'] ?>
                        </a>
                    </div>
                    <?php
                    if (!empty($item['button'])) {
                    ?>
                        <div>
                            <a role="button" class="btn btn-primary" href="<?= $item['link'] ?>" title="Vai alla pagina <?= strip_tags($item['content']) ?>">
                                <?= $buttonLabel ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php
            } else {
            ?>
                <?= $item['content'] ?>
            <?php }
            ?>
        </div>
    </div>
    </li>