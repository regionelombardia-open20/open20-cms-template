<?php

use app\modules\uikit\Uikit;

/**
 * @var $this
 * @var $data
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
$id = $data['id'];
$class = $data['class'];
$attrs = $data['attrs'];

// Accordion
$attrs['uk-accordion'] = Uikit::json(Uikit::pickBool($data, ['multiple', 'collapsible']));


?>
<?php if ($canSeeBlock): ?>
    <div<?= Uikit::attrs(compact('id', 'class'), $attrs) ?>>

        <?php foreach ($data['items'] as $item) : ?>
            <div class="el-item">
                <?php
                if ($item['accordion_image']) {

                    $attrs_image['class'][] = 'el-image';

                    if (Uikit::isImage($item['image']) == 'gif') {
                        $attrs_image['uk-gif'] = true;
                    }
                    $item['accordion_image'] = Uikit::image($item['accordion_image'], $attrs_image);
                }
                ?>
                <a class="el-title uk-accordion-title <?= $item['accordion_image_class'] ?>" href="#">
                    <?= $item['accordion_image'] ?>
                    <p><?= $item['title'] ?></p></a>

                <div class="uk-accordion-content">
                        <?= $this->render('accordionplus/item', compact('item', 'data')) ?>
                    <div class="attachments-detail">
                        <ul>
                            <?php foreach ($item['attachment'] as $attach) : ?>
                                <li class="attachments-detail__item">
                                    <?php
                                    $infos = [];
                                    if ($attach) {

                                        $fileSystem = new app\modules\cms\utility\StorageUtility();
                                        $infos = $fileSystem->getFileInfo($attach['fileId']);
                                    }
                                    ?>
                                    <a class="el-title" href="<?= isset($infos['url']) ? $infos['url'] : '' ?>" title="<?= $infos['name'] ?>">
                                        <div class="news-allegato-icon">
                                            <i class="glyphicon glyphicon-file"></i>
                                        </div>
                                        <div class="news-allegato-name"><?= $attach['caption'] ?>.<?= $infos['type'] ?></div>
                                        <div class="news-allegato-kb"><?= isset($infos['size']) ? $infos['size'] : '' ?></div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
<?php endif; ?>