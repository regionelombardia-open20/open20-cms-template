<?php

use app\modules\uikit\assets\FrontAsset;
use yii\web\View;
use app\modules\uikit\Uikit;


/**
 * @var $this object
 * @var $data array
 */

$attrs = $data['attrs'];
$class = $data['class'];

$externalGridClass='it-grid-list-wrapper';
$internalGridClass='';
$columnClass='';


switch($data['gallery_type']){
    case 2: 
        $externalGridClass= $externalGridClass.' '.'it-image-label-grid it-masonry';
        $internalGridClass= $internalGridClass.'card-columns';
        $columnClass= $columnClass.'col-12';
    break;
    default:
        $internalGridClass= $internalGridClass.'grid-row';
        $columnClass= $columnClass.'col-xs-12 col-sm-6 col-lg-4';

    break;
}

FrontAsset::register($this);

$c = 0;
?>

<div class="<?= $externalGridClass ?>">
    <div class="<?= $internalGridClass ?>">
        <?php foreach ($data['items'] as $item) : 
            $c++; 
            $item['contatore'] = $c; 
            $item['lightbox'] = $data['lightbox'];
        ?>
            <div class="<?= $columnClass ?>">
                <?= $this->render('gallerypanel/item', compact('item', 'data')) ?>
            </div>
        <?php endforeach ?>
    </div>
</div>



