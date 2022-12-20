<?php
/**
 * @var $this \luya\cms\base\PhpBlockView
*/
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




?>
<?php if ($canSeeBlock): ?>
	<?php if ($this->extraValue('url')): ?>
		<?php if ($this->cfgValue('width')): ?>
		<div style="width:<?= $this->cfgValue('width'); ?>px">
		<?php endif; ?>
		<div class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="<?= $this->extraValue('url'); ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
		<?php if ($this->cfgValue('width')): ?>
		</div>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; 