<?php

use yii\widgets\ListView;
use open20\amos\core\module\BaseAmosModule;
use yii\helpers\Html;
use open20\design\assets\BootstrapItaliaDesignAsset;
use open20\amos\admin\AmosAdmin;
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
            $titleSection = BaseAmosModule::t('amosapp', 'Community');
            $urlLinkAll = BaseAmosModule::t('amosapp', 'community/community/index');
            $labelLinkAll = BaseAmosModule::t('amosapp', 'Tutte le community');
            $titleLinkAll = BaseAmosModule::t('amosapp', 'Visualizza la lista delle community');

            $subTitleSection = Html::tag('p', BaseAmosModule::t('amosapp', 'Cocreazione per la generazione di nuove idee: le community sono uno degli strumenti caratteristici di questa piattaforma. Attraverso gruppi di lavoro dedicati, le iniziative di {platformName} creano spazi di collaborazione, innovazione, condivisione e networking.', ['platformName' => \Yii::$app->name]));
            $ctaLoginRegister = Html::a(
                BaseAmosModule::t('amosapp', 'accedi o registrati alla piattaforma'),
                isset(\Yii::$app->params['linkConfigurations']['loginLinkCommon']) ? \Yii::$app->params['linkConfigurations']['loginLinkCommon'] : \Yii::$app->params['platform']['backendUrl'] . '/' . AmosAdmin::getModuleName() . '/security/login',
                [
                    'title' => BaseAmosModule::t('amosapp', 'Clicca per accedere o registrarti alla piattaforma {platformName}', ['platformName' => \Yii::$app->name])
                ]
            );
            $subTitleSection .= Html::tag('p', BaseAmosModule::t('amosapp', 'Se vuoi accedere ai contenuti delle community di {platformName} {ctaLoginRegister}', ['platformName' => \Yii::$app->name, 'ctaLoginRegister' => $ctaLoginRegister]));
        } else {
            $titleSection = BaseAmosModule::t('amosapp', 'Le mie community');
            $urlLinkAll = BaseAmosModule::t('amosapp', '/community/community/my-communities');
            $labelLinkAll = BaseAmosModule::t('amosapp', 'Tutte le community a cui partecipi');
            $titleLinkAll = BaseAmosModule::t('amosapp', 'Visualizza la lista delle community a cui partecipi');

            $subTitleSection = Html::tag('p', BaseAmosModule::t('amosapp', 'Cocreazione per la generazione di nuove idee: le community sono uno degli strumenti caratteristici di questa piattaforma. Attraverso gruppi di lavoro dedicati, le iniziative di {platformName} creano spazi di collaborazione, innovazione, condivisione e networking.', ['platformName' => \Yii::$app->name]));
        }

        $labelCreate = BaseAmosModule::t('amosapp', 'Nuova');
        $titleCreate = BaseAmosModule::t('amosapp', 'Crea una nuova community');
        $labelManage = BaseAmosModule::t('amosapp', 'Gestisci');
        $titleManage = BaseAmosModule::t('amosapp', 'Gestisci le community');
        $urlCreate = BaseAmosModule::t('amosapp', '/community/community/create');

        $manageLinks = [];
        $controller = \open20\amos\community\controllers\CommunityController::class;
        if (method_exists($controller, 'getManageLinks')) {
            $manageLinks = $controller::getManageLinks();
        }

        $canCreate = \Yii::$app->user->can('COMMUNITY_CREATE', ['model' => $model]);

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

    <div class="card-<?= $modelLabel ?>-container">
        <?php
        if ($dataProvider->getTotalCount() > 0) {

            $listViewLayout = $this->render('@vendor/open20/design/src/components/yii2/views/listViewLayout');

            echo ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_itemCardCommunityDesign',
                'viewParams' => [
                    'detailPage' => $detailPage,
                    'viewFields' => $viewFields,
                    'blockItemId' => $blockItemId,
                    'hideAllCtaGuest' => (strpos($cssClass, 'hide-all-cta-guest') !== false)
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