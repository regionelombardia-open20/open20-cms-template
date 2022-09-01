<?php
use yii\helpers\Url;

?>
<div id='subnav-c75' class='breadcrumb text-600'>
    <ul class='uk-subnav uk-margin-remove-bottom'>
        <li><a href="<?= Yii::$app->menu->home->link ?>"><?= Yii::$app->menu->home->title ?></a></li>
        <?php
        foreach ($items as $item) 
        {
        ?>
            <li class="el-item"><a href="<?= $item->link ?>"><?= $item->title ?></a></li>
            <?php
        }

        $current = Yii::$app->menu->current;
        if (false /*!is_null($current) && !$current->isHome*/) {
            ?>
            <li class="el-content uk-disabled"><?= $current->title ?></li>
                <?php }
            ?>
    </ul>
</div>