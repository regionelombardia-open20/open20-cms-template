<?php

use yii\widgets\ListView;
use open20\amos\core\module\BaseAmosModule;
use yii\helpers\Html;
use open20\design\assets\BootstrapItaliaDesignAsset;
use open20\design\utility\DesignUtility;
use open20\amos\admin\AmosAdmin;

$currentAsset = BootstrapItaliaDesignAsset::register($this);

$isGuest = \Yii::$app->user->isGuest;
?>

<?php if ($isGuest) { ?>

    <?php
    $modelLabel = strtolower($model->getGrammar()->getModelLabel());
    ?>
    <div class="modulo-backend-<?= $modelLabel ?> <?= $cssClass ?>">
        <?php if (!($cssClass == 'hide-bi-plugin-header')) : ?>
            <?php
            if ($isGuest) {
                $titleSection = BaseAmosModule::t('amosapp', 'Proposte di collaborazione');
                $urlLinkAll = BaseAmosModule::t('amosapp', 'partnershipprofiles/partnership-profiles/index');
                $labelLinkAll = BaseAmosModule::t('amosapp', 'Tutte le proposte');
                $titleLinkAll = BaseAmosModule::t('amosapp', 'Visualizza la lista delle proposte');

                $subTitleSection = Html::tag('p', BaseAmosModule::t('amosapp', 'Innovazione, competitività e networking: la piattaforma Open Innovation offre ai suoi utenti l’opportunità di entrare in contatto con centinaia di imprese e collaborare nello sviluppo di progetti e attività.', ['platformName' => \Yii::$app->name]));
                $ctaLoginRegister = Html::a(
                    BaseAmosModule::t('amosapp', 'accedi o registrati alla piattaforma'),
                    isset(\Yii::$app->params['linkConfigurations']['loginLinkCommon']) ? \Yii::$app->params['linkConfigurations']['loginLinkCommon'] : \Yii::$app->params['platform']['backendUrl'] . '/' . AmosAdmin::getModuleName() . '/security/login',
                    [
                        'title' => BaseAmosModule::t('amosapp', 'Clicca per accedere o registrarti alla piattaforma {platformName}', ['platformName' => \Yii::$app->name])
                    ]
                );
                $subTitleSection .= Html::tag('p', BaseAmosModule::t('amosapp', 'Se vuoi rispondere alle proposte di collaborazione di {platformName} {ctaLoginRegister}', ['platformName' => \Yii::$app->name, 'ctaLoginRegister' => $ctaLoginRegister]));
            } else {
                $titleSection = BaseAmosModule::t('amosapp', 'Proposte di mio interesse');
                $urlLinkAll = BaseAmosModule::t('amosapp', '/partnershipprofiles/partnership-profiles/own-interest');
                $labelLinkAll = BaseAmosModule::t('amosapp', 'Tutte le proposte di mio interesse');
                $titleLinkAll = BaseAmosModule::t('amosapp', 'Visualizza tutte le proposte');

                $subTitleSection = Html::tag('p', BaseAmosModule::t('amosapp', 'Innovazione, competitività e networking: la piattaforma {platformName} offre ai suoi utenti l’opportunità di entrare in contatto con centinaia di imprese e collaborare nello sviluppo di progetti e attività.', ['platformName' => \Yii::$app->name]));
                $subTitleSection .= Html::tag('p', BaseAmosModule::t('amosapp', 'Lancia una nuova proposta di collaborazione sulla piattaforma, clicca su “NUOVA”!', ['platformName' => \Yii::$app->name]));
            }

            $labelCreate = BaseAmosModule::t('amosapp', 'Nuova');
            $titleCreate = BaseAmosModule::t('amosapp', 'Crea una nuova proposta');
            $labelManage = BaseAmosModule::t('amosapp', 'Gestisci');
            $titleManage = BaseAmosModule::t('amosapp', 'Gestisci le proposte');
            $urlCreate = BaseAmosModule::t('amosapp', '/partnershipprofiles/partnership-profiles/create');

            $manageLinks = [];

            $controller = \open20\amos\partnershipprofiles\controllers\PartnershipProfilesController::class;
            if (method_exists($controller, 'getManageLinks')) {
                $manageLinks = $controller::getManageLinks();
            }

            $canCreate = \Yii::$app->user->can('PARTNERSHIPPROFILES_CREATE', ['model' => $model]);

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
                    'itemView' => '_itemPartnershipProfilesDesign',
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
<?php } ?>