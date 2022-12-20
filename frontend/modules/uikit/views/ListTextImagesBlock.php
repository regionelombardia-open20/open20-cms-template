<?php

use app\modules\uikit\Uikit;
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
 * @var $this object
 * @var $data array
 * @var $item array
 */

$attrs_grid = [];
$attrs_cell = [];


?>
<?php if ($canSeeBlock): ?>
    <ul class="pl-0 <?= $item['vertical_element']? 'd-flex flex-wrap' : '' ?>">
        <?php foreach ($data["items"] as $item) : ?>
            <li class="el-item my-3 col-12 row <?= $item['vertical_element']? 'flex-column' : '' ?>">
                <?= $this->render('list-text-images/item', compact('item', 'data')) ?>
            </li>
        <?php endforeach ?>
    </ul>
<?php endif; ?>

         
        
