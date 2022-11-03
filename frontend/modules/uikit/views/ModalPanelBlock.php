<?php

use app\modules\uikit\Uikit;
use open20\design\assets\BootstrapItaliaDesignAsset;
use open20\design\utility\DesignIcon;

$currentAsset = BootstrapItaliaDesignAsset::register($this);

/**
 * @var $this
 * @var $data
 */
$id = $data['id'];
$class = $data['class'][0];

$attrs_image = [];
$attrs_link = [];
$attrs_link_modal = [];


// Link
if ($data['linkModal']) {
    $attrs_link_modal['href'] = $data['linkModal'];
    $attrs_link_modal['target'] = $data['link_target'] ? '_blank' : '';
    $attrs_link_modal['uk-scroll'] = strpos($data['linkModal'], '#') === 0;
    $attrs_link_modal['class'][] = 'el-link';
    switch ($data['link_style']) {
        case '':
            break;
        case 'link-muted':
        case 'link-text':
            $attrs_link_modal['class'][] = "uk-{$data['link_style']}";
            break;
        default:
            $attrs_link_modal['class'][] = "uk-button uk-button-{$data['link_style']}";
            $attrs_link_modal['class'][] = $data['link_size'] ? "uk-button-{$data['link_size']}" : '';
    }
}

/*
if ($data['link_block']) : ?>
<a class="" data-toggle="modal" data-target="<?= '#' . $modalID ?>" title="<?= $data['text_hover'] ?>">
    <?php endif ?>
    <div class="wrap-modal-box">

        <?php if ($data['image']): ?>
            <figure>
                <?php
                $attrs_image['class'][] = 'el-image';
                $image = Uikit::image($data['image'], $attrs_image);
                ?>
                <?= $image ?>
                <figcaption><p><?= $data['text'] ?></p></figcaption>
            </figure>
        <?php else: ?>
            <p><?= $data['text'] ?></p>
            <?php if ((!$data['link_block']) && ($data['link_text'])) : ?>
            <a class="uk-button uk-button-default btn-landing btn-landing-grey" data-toggle="modal"
               data-target="<?= '#' . $modalID ?>" title="<?= $data['text_hover'] ?>">
                <?= $data['link_text'] ?>
            </a>
            <?php endif ?>
        <?php endif ?>

        <div class="overlay">
            <div class="text"><?= $data['text_hover'] ?></div>
        </div>

    </div>
    <?php if ($data['link_block']) : ?>
</a>
<?php endif ?>


*/
?>
<!--MODALE-->
<div id="<?=$id?>" class="<?= $class ?> modal fade" tabindex="-1" role="dialog" id="<?= $modalID ?>">
    <div class="modal-dialog modal-<?= $data['modal_size'] ?>" role="document">
        <div class="modal-content modal-<?= $data['modal_size'] ?>" style="background-size: cover;background-image: url(<?= $data['backgroundImg'] ?>)">
            <div class="modal-header">
                <p class="modal-title h5"><?= $data['modal_title'] ?></p>
              
                <?php if($data['can_close']): ?>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <?= DesignIcon::show('it-close', DesignIcon::ICON_BI, 'icon ', $currentAsset)?>
                    </button>
                <?php endif; ?>
            </div>
            <div class="modal-body">
            <?php if ($this->extraValue('url')): ?>
	
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="<?= $this->extraValue('url'); ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
  
            <?php endif; ?>
                <p><?= $data['modal_text'] ?></p>
                
            </div>
            <?php if(
                (!empty($data['can_close_button'])) &&
                (!empty($data['second_button']))
            ): ?>

                <div class="modal-footer">
                    <?php if(!empty($data['can_close_button'])): ?>
                        <button class="btn btn-outline-primary btn-sm" type="button" data-dismiss="modal">Annulla</button>
                    <?php endif; ?>
                    <?php if(!empty($data['second_button'])): ?>
                        <a href="<?= $data['second_button']?>" class="btn btn-primary btn-sm" title="Accetta">Accetta</a>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

        </div>
    </div>
</div>




<button 
    class="btn btn-<?= $data['modal_button_style'] ?> <?= $data['button_class']?> open20-cms-button" 
    data-toggle="modal" 
    data-target="#<?=$id?>"
>
    <?php switch($data['icon_type'])
            {
                case 1:
                    echo DesignIcon::show($data['icon_name'], DesignIcon::ICON_BI, 'icon', $currentAsset);
                break;
                case 2:
                    echo DesignIcon::show($data['icon_name'], DesignIcon::ICON_MD, 'icon', $currentAsset);
                break;
            }
    ?>

    <?= $data['modal_button_text']?>
</button>