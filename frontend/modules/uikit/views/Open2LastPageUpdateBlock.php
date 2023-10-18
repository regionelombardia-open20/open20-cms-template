<?php

use open20\design\assets\BootstrapItaliaDesignAsset;
use app\modules\uikit\Module;
use app\modules\uikit\BaseUikitBlock;

$canSeeBlock = true;
$visibility = $this->varValue('visibility');

switch($visibility){
    case 'guest':
        $canSeeBlock = Yii::$app->user->isGuest;          
    break;
    case 'logged':
        $canSeeBlock = !Yii::$app->user->isGuest; 
		$n_class = $this->varValue('addclass');
		if($canSeeBlock && !empty($n_class)){
			$canSeeBlock = BaseUikitBlock::visivility($n_class);
		}
    break;
}

/**
 * @var $this
 * @var $data
 */
$bootstrapItaliaAsset = BootstrapItaliaDesignAsset::register($this);


$id = $data['id'];
$class = $data['class_div'];

?>
<?php if ($canSeeBlock): ?>
    <div class='<?=$class?> <?= ($data['text_type']=='disposizione-2')? 'd-flex align-items-center' : '';?> text-<?= $data['text_align']?>'>
        <p class='last-update-label mb-2'> <?= (!empty($data['update_label']))? $data['update_label'] : 'Ultimo aggiornamento:';?></p>
        <p class='font-weight-bold <?= ($data['text_type']=='disposizione-2')? 'pl-3' : '';?>'> <?= $date_update?> <?= ($data['hour']? $time_update : '') ?></p>
    </div>
<?php endif; ?>