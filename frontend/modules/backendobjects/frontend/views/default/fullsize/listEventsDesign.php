<?php

use yii\widgets\ListView;
use open20\amos\core\module\BaseAmosModule;
use open20\design\assets\BootstrapItaliaDesignAsset;
use open20\design\utility\DesignUtility;

$currentAsset = BootstrapItaliaDesignAsset::register($this);

$isGuest = \Yii::$app->user->isGuest;
?>


<?php
$modelLabel = strtolower($model->getGrammar()->getModelLabel());
?>
<div class="modulo-backend-<?= $modelLabel ?> <?= $cssClass ?>">

    <?php if (!($cssClass == 'hide-bi-plugin-header')) : ?>
        <?php
        if ($isGuest) {
            $titleSection = BaseAmosModule::t('amosapp', 'Eventi');
            $urlLinkAll = BaseAmosModule::t('amosapp', '/events/event/all-events');
            $labelLinkAll = BaseAmosModule::t('amosapp', 'Tutti gli eventi');
            $titleLinkAll = BaseAmosModule::t('amosapp', 'Visualizza la lista degli eventi');
        } else {
            $titleSection = BaseAmosModule::t('amosapp', 'Eventi di mio interesse');
            $urlLinkAll = BaseAmosModule::t('amosapp', '/events/event/own-interest');
            $labelLinkAll = BaseAmosModule::t('amosapp', 'Tutti gli eventi di mio interesse');
            $titleLinkAll = BaseAmosModule::t('amosapp', 'Visualizza la lista degli eventi di mio interesse');
        }

        $labelCreate = BaseAmosModule::t('amosapp', 'Nuovo');
        $titleCreate = BaseAmosModule::t('amosapp', 'Crea un nuovo evento');
        $labelManage = BaseAmosModule::t('amosapp', 'Gestisci');
        $titleManage = BaseAmosModule::t('amosapp', 'Gestisci gli eventi');
        $urlCreate = BaseAmosModule::t('amosapp', '/events/event/create');

        $manageLinks = [];
        $controller = \open20\amos\events\controllers\EventsController::class;
        if (method_exists($controller, 'getManageLinks')) {
            $manageLinks = $controller::getManageLinks();
        }

        $canCreate = \Yii::$app->user->can('EVENTS_CREATE', ['model' => $model]);

        ?>
        <?=
        $this->render(
            '@vendor/open20/design/src/views/layouts/parts/bi-plugin-header',
            [
                'isGuest' => $isGuest,
                'modelLabel' => $modelLabel,
                'titleSection' => $titleSection,
                'subTitleSection' => $subTitleSection,
                'urlLinkAll' => $urlLinkAll,
                'labelLinkAll' => $labelLinkAll,
                'titleLinkAll' => $titleLinkAll,
                'canCreate' => $canCreate,
                'labelCreate' => $labelCreate,
                'titleCreate' => $titleCreate,
                'labelManage' => $labelManage,
                'titleManage' => $titleManage,
                'urlCreate' => $urlCreate,
                'manageLinks' => $manageLinks,
            ]
        );
        ?>
    <?php endif ?>

    <div class="list-<?= $modelLabel ?>-container d-flex flex-wrap">
        <?php
        if ($dataProvider->getTotalCount() > 0) {

            $listViewLayout = $this->render('@vendor/open20/design/src/components/yii2/views/listViewLayout');
            echo ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_itemEventsDesign',
                'viewParams' => [
                    'detailPage' => $detailPage,
                    'viewFields' => $viewFields,
                    'blockItemId' => $blockItemId,
                ],
                'layout' => $listViewLayout,
                'summary' => DesignUtility::getLayoutSummary($withPagination),
                'pager' => DesignUtility::listViewPagerConfig(),
                'itemOptions' => [
                    'tag' => false
                ],
                'options' => [
                    'class' => 'list-view w-100'
                ]
            ]);
        } else { ?>
            <?php if (!$isGuest) : ?>
                <div class="no-<?= str_replace(' ', '-', $modelLabel) ?>-alert">
                    <p><?= BaseAmosModule::t('amosapp', 'Non ci sono contenuti che corrispondono ai tuoi interessi') ?></p>
                </div>
            <?php endif; ?>
        <?php } ?>
    </div>
</div>