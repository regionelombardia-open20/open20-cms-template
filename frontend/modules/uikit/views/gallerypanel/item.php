<?php

use trk\uikit\Uikit;
use open20\design\utility\DesignIcon;

$itemExternalClass='it-grid-item-wrapper';
if(!empty($item['content']) && $item['superimposed_caption']==1): 
    $itemExternalClass= $itemExternalClass.' '.'it-grid-item-overlay';
endif;
?>
<div class="<?= $itemExternalClass ?>"> 
    <?php if (!empty ($item['link'])): ?>
        <a href="<?= $item['link'] ?>">
    <?php elseif ($item['lightbox']): ?>
        <a href="javascript:void(0)" data-toggle="modal" data-target="#galleryModal<?=$item['contatore']?>">
    <?php endif; ?>
        <div class="img-responsive-wrapper">
            <div class="img-responsive">
                <div class="img-wrapper">
                        <img src="<?=  $item['image']  ?>" alt="image Alt" title="Image Title">
                </div>
            </div>
        </div>
        <?php if(!empty($item['content'])) : ?>
            <span class="it-griditem-text-wrapper">
                <span class="it-griditem-text"><?= $item['content'] ?></span>
            </span>
        <?php endif; ?>

    <?php if (!empty ($item['link']) || ($item['lightbox'])): ?>
        </a>
    <?php endif; ?>
</div>


<div class="modal fade galleryModal<?=$item['contatore']?>" tabindex="-1" role="dialog" id="galleryModal<?=$item['contatore']?>" aria-labelledby="galleryModal<?=$item['contatore']?>">
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-transparent">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <?= DesignIcon::show('it-close', DesignIcon::ICON_BI, 'icon icon-lg icon-white', $currentAsset)?>
                </button>
            </div>
            <div class="modal-body">
                <img src="<?=  $item['image']  ?>" class="el-image w-100" alt="image Alt" title="Image Title">
            </div>
        </div>
    </div>
</div>