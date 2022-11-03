<?php

use app\modules\uikit\Uikit;
use open20\design\assets\BootstrapItaliaDesignAsset;
use open20\design\utility\DesignIcon;

/**
 * @var $this
 * @var $data
 */

$currentAsset = BootstrapItaliaDesignAsset::register($this);


$linkClass = is_array($data['class']) ? implode(' ',$data['class']) : $data['class'];
if($data['link_type']=='button'){
    $linkClass=$linkClass . ' btn'. ' btn-'. $data['button_style'] . ' btn-' . $data['button_size'];
    if(!empty($data['icon_name'])){
        $linkClass=$linkClass . ' btn-icon';
    }
}

$linkTarget = $data['link_target'] ? '_blank' : '_self';
$linkClass = $data['is_disabled'] ? $linkClass . ' disabled' : $linkClass;

$iconClass='icon';


?>
<?php if($data['HTML_type']=='button'): ?>
    <button class="<?= $linkClass ?> open20-cms-button" 
    role="button" 
    style="<?= $this->extraValue('style') ?>"
    >
<?php else: ?>
    <a class="<?= $linkClass ?> open20-cms-button" 
    href="<?= $data['link'] ?>" 
    target="<?= $linkTarget ?>" 
    title="<?= strip_tags($data['text_content']) ?>" 
    <?=$data['is_disabled'] ? 'aria-disabled="true"' : '';?>
    style="<?= $this->extraValue('style') ?>"
    >
<?php endif; ?>

        <?php if($data['icon_rounded']): ?>
            <span class="rounded-icon">
        <?php endif; ?>
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
        <?php if($data['icon_rounded']): ?>
            </span>
        <?php endif; ?>
        <span><?= $data['text_content'] ?></span>

<?php if($data['HTML_type']=='button'): ?>
    </button>
<?php else: ?>
    </a>
<?php endif; ?>


<?php if(!empty($data['text_color'])): ?>
    <style>
        svg{
            fill:currentColor !important;
        }
    </style>
<?php endif; ?>

