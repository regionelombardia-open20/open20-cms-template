<?php

use trk\uikit\Uikit;

/**
 * @var $this object
 * @var $data array
 * @var $item array
 */

$attrs_grid = [];
$attrs_cell = [];

$imageClass='';
if($item['rounded_img']){
    $imageClass='rounded';
}

?>
<?php if($item['link_image']): ?>
    <div class="<?= ($item['vertical_element'])? 'col-md-12' : 'col-md-3' ?> mb-3 mb-md-0">
        <?php if($item['link'] ): ?>
            <?= \yii\helpers\Html::a(\yii\helpers\Html::img($item['link_image'],['class'=>'img-fluid']),$item['link'],['alt'=>'Immagine dell\'elemento','target'=>$item['link_target']]) ?>    
            <?php else: ?>
                <?= \yii\helpers\Html::img($item['link_image'],['class'=>'img-fluid '.$imageClass]) ?>    
            <?php endif; ?>
    </div>
<?php endif; ?>

<div class="<?=(!($item['link_image']) || $item['vertical_element'] )? 'col-md-12' : 'col-md-9' ?> d-flex flex-column"> 
    <?php if($item['link']): ?>
        <a href="" title="Vai alla puntata" class="title-one-line  link-list-title  mr-3 mb-0">
    <?php endif; ?>
    <p class="h4">    
        <?= $item['title'] ?>
    </p>
    <?php if($item['link']): ?>
        </a>
    <?php endif; ?>
    <?php if($item['subtitle']): ?>
        <p class="lead  mb-2"><?= $item['subtitle'] ?></p>  
    <?php endif; ?>
    <?php if($item['content']): ?>
        <p class="mb-0 title-two-line-desktop">
            <?= $item['content'] ?>
        </p>
    <?php endif; ?>

</div>



