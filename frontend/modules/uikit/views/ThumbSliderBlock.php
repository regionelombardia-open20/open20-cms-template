<?php

//use app\modules\uikit\assets\FrontAsset;
use app\assets\ThumbSliderAsset;
use yii\web\View;
use app\modules\uikit\Uikit;


ThumbSliderAsset::register($this);


/**
 * @var $this object
 * @var $data array
 */

$attrs = $data['attrs'];

//gallery with thumb
if (empty($data['hidethumb'])) {
    $classGallery = ' galleryThumb';
}else {
    $classGallery = ' gallerySlider';
}

//gallery NO thumb
if (!empty($data['class'])) {
    $class = 'wrap-lightslider '. $data['class'] . $classGallery;
}else {
    $class = 'wrap-lightslider '. $classGallery;
}

$controls = $data['showactions'] ? 'true' : 'false';
$gallery = $data['gallery'] ? 'true' : 'false';

if($gallery == 'true') {
    $class = $class. ' isGalleryClass';
}

//FrontAsset::register($this);


?>
<div class="thumbslider-container">
    <div <?= Uikit::attrs(compact('class'), $attrs) ?>>
        <ul id="lightSlider">
            <?php foreach ($data['items'] as $item) : ?>
                <?= $this->render('thumbslider/item', compact('item', 'data')) ?>
            <?php endforeach ?>
        </ul>

        <?php if($controls  == 'true'): ?>
            <div class="lightSliderAction">
                <span class="am am-play play-btn" ></span>
                <span class="am am-pause pause-btn"></span>
            </div>
        <?php endif; ?>
    </div>
</div>