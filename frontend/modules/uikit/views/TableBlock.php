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
    <?php if (!empty($this->extraValue('table'))): ?>
        <div<?= $this->cfgValue('divCssClass', null, ' class="{{divCssClass}}"'); ?>>
            <table class="table<?= $this->cfgValue('stripe', null, ' table-striped') . $this->cfgValue('border', null, ' table-bordered'); ?>">
                <?php if ($this->cfgValue('header')): ?>
                    <thead>
                        <tr>
                            <?php foreach ($this->extraValue('headerData', []) as $column): ?>
                            <th><?= $column; ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                <?php endif; ?>
                <tbody>
                    <?php foreach ($this->extraValue('table', []) as $row): ?>
                    <tr>
                        <?php foreach ($row as $column): ?>
                        <td<?php if ($this->cfgValue('equaldistance')): ?> class="col-md-<?= round(12/count($row)); ?>"<?php endif; ?>><?= $column; ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
<?php endif; 
