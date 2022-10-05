<?php

use yii\widgets\ListView;
use open20\amos\core\module\BaseAmosModule;
use open20\amos\discussioni\AmosDiscussioni;
use open20\design\assets\BootstrapItaliaDesignAsset;
use open20\amos\admin\AmosAdmin;
use yii\helpers\Html;
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
            $titleSection = AmosDiscussioni::t('amosdiscussioni', 'Discussioni');
            $urlLinkAll = '/discussioni/discussioni-topic/all-discussions';
            $labelLinkAll = AmosDiscussioni::t('amosdiscussioni', 'Tutte le discussioni');
            $titleLinkAll = BaseAmAmosDiscussioniosModule::t('amosdiscussioni', 'Visualizza la lista delle discussioni');

            $ctaLoginRegister = Html::a(
                AmosDiscussioni::t('amosdiscussioni', 'accedi o registrati alla piattaforma'),
                isset(\Yii::$app->params['linkConfigurations']['loginLinkCommon']) ? \Yii::$app->params['linkConfigurations']['loginLinkCommon']
                    : \Yii::$app->params['platform']['backendUrl'] . '/' . AmosAdmin::getModuleName() . '/security/login',
                [
                    'title' => AmosDiscussioni::t(
                        'amosdiscussioni',
                        'Clicca per accedere o registrarti alla piattaforma {platformName}',
                        ['platformName' => \Yii::$app->name]
                    )
                ]
            );
            $subTitleSection  .= Html::tag(
                'p',
                AmosDiscussioni::t(
                    'amosdiscussioni',
                    'Per partecipare alla creazione di nuove discussioni, {ctaLoginRegister}',
                    ['ctaLoginRegister' => $ctaLoginRegister]
                )
            );
        } else {
            $titleSection = AmosDiscussioni::t('amosdiscussioni', 'Discussioni di mio interesse');
            $urlLinkAll = '/discussioni/discussioni-topic/own-interest-discussions';
            $labelLinkAll = AmosDiscussioni::t('amosdiscussioni', 'Tutte le discussioni di mio interesse');
            $titleLinkAll = AmosDiscussioni::t('amosdiscussioni', 'Visualizza la lista delle discussioni di mio interesse');

            $subTitleSection = Html::tag('p', AmosDiscussioni::t('amosapp', ''));
        }

        $labelCreate = AmosDiscussioni::t('amosdiscussioni', 'Nuova');
        $titleCreate = AmosDiscussioni::t('amosdiscussioni', 'Crea una nuova discussione');
        $labelManage = AmosDiscussioni::t('amosdiscussioni', 'Gestisci');
        $titleManage = AmosDiscussioni::t('amosdiscussioni', 'Gestisci le discussioni');
        $urlCreate = AmosDiscussioni::t('amosdiscussioni', '/discussioni/discussioni-topic/create');

        $manageLinks = [];
        $controller = \open20\amos\discussioni\controllers\DiscussioniTopicController::class;
        if (method_exists($controller, 'getManageLinks')) {
            $manageLinks = $controller::getManageLinks();
        }

        $canCreate = \Yii::$app->user->can('DISCUSSIONITOPIC_CREATE', ['model' => $model]);

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

    <div class="list-<?= $modelLabel ?>-container">
        <?php
        if ($dataProvider->getTotalCount() > 0) {

            $listViewLayout = $this->render('@vendor/open20/design/src/components/yii2/views/listViewLayout');

            echo ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_itemListDiscussionsDesign',
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