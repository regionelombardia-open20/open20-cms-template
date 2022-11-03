<?php

use trk\uikit\Uikit;

/**
 * @var $this object
 * @var $data array
 */

$id    = $data['id'];
$class = $data['class'];
$attrs = $data['attrs'];
$attrs_slideshow_items = [];
$attrs_container = [];
// Slideshow
?>

<div class="it-carousel-wrapper it-carousel-landscape-abstract-four-cols owl-carousel-design">
    <div class="it-carousel-all owl-carousel owl-loaded owl-drag">
        <div class="owl-stage-outer">
            <div class="owl-stage">
                <?php foreach ($data['items'] as $i => $item) : ?>
                    <div class="owl-item ">
                        <?= $this->render('slideshow/item', compact('item', 'i', 'data')) ?>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
