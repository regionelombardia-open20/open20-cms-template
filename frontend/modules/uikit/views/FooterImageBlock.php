<?php

/**
 * @var $this object
 * @var $data array
 */

$id    = $data['id'];
$imgClass = $data['class'][0];
$linkClass = $data['link_class'];
$linkTarget = $data['link_target'] ? '_blank' : '_self';

// Shadow
$imgClass = $data['image_box_shadow'] ? $imgClass . ' shadow' : $imgClass;


?>
<div class="image-block">
    <?php if ($data['link']) : ?>
        <a class="<?= $linkClass ?>" href="<?= $data['link'] ?>" target="<?= $linkTarget ?>" title="<?= $data['link_title'] ?>">
            <div>
                <img src="<?= $data['image'] ?>" class="<?= $imgClass ?>" alt="<?= $data['image_alt'] ?>">
            </div>
            <?php if ($data['text']) : ?>
                <span><?= $data['text'] ?></span>
            <?php endif; ?>
        </a>
    <?php else : ?>
        <div>
            <img src="<?= $data['image'] ?>" class="<?= $imgClass ?>" alt="<?= $data['image_alt'] ?>">
        </div>
        <?php if ($data['text']) : ?>
            <span><?= $data['text'] ?></span>
        <?php endif; ?>
    <?php endif ?>
</div>