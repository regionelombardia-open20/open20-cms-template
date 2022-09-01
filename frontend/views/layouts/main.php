<?php

use app\modules\seo\frontend\behaviors\LuyaSeoBehavior;
use app\components\CmsHelper;
use open20\design\assets\BootstrapItaliaDesignAsset;
use yii\helpers\Html;

/* @var $this luya\web\View */
/* @var $content string */ 

$this->attachBehavior('seo', LuyaSeoBehavior::className());

$currentAsset = BootstrapItaliaDesignAsset::register($this);
$iconSubmenu = '<svg class="icon icon-expand icon-sm"><use xlink:href="' . $currentAsset->baseUrl . '/node_modules/bootstrap-italia/dist/svg/sprite.svg#it-expand"></use></svg>';

$searchPage = (isset(\Yii::$app->params['linkConfigurations']['pageSearchLinkCommon'])) ? \Yii::$app->params['linkConfigurations']['pageSearchLinkCommon'] : '/it/ricerca';

$mainMenu = (isset(\Yii::$app->params['menuCmsConfigurations']['mainCmsMenu'])) ? \Yii::$app->params['menuCmsConfigurations']['mainCmsMenu'] : 'default';
$secondaryMenu = (isset(\Yii::$app->params['menuCmsConfigurations']['secondaryCmsMenu'])) ? \Yii::$app->params['menuCmsConfigurations']['secondaryCmsMenu'] : 'secondary';
$footerMenu = (isset(\Yii::$app->params['menuCmsConfigurations']['footerCmsMenu'])) ? \Yii::$app->params['menuCmsConfigurations']['footerCmsMenu'] : 'footer';

$cmsDefaultMenuCustomClass = 'cms-menu-container-default';
$cmsSecondaryMenuCustomClass = 'cms-menu-container-secondary';
$cmsFooterMenuCustomClass = 'cms-menu-container-footer';
$cmsPluginMenuCustomClass = 'cms-menu-container-plugin';

$cmsDefaultMenu = CmsHelper::BiHamburgerMenuRender(
    Yii::$app->menu->findAll([
        'depth' => 1,
        'container' => $mainMenu
    ]),
    $iconSubmenu,
    false,
    $currentAsset
);

$cmsDefaultMenuFooter = CmsHelper::BiHamburgerMenuRender(
    Yii::$app->menu->findAll([
        'depth' => 1,
        'container' => $mainMenu
    ]),
    $iconSubmenu,
    true,
    $currentAsset
);

$cmsFooterMenu  = CmsHelper::BiHamburgerMenuRender(
    Yii::$app->menu->findAll([
        'depth' => 1,
        'container' => $footerMenu
    ]),
    $iconSubmenu,
    true
);

if (!\Yii::$app->params['layoutConfigurations']['hideCmsMenuPluginHeader']) {
    $cmsPluginMenu = open20\amos\core\module\AmosModule::getModulesFrontEndMenus();
}

if (\Yii::$app->params['layoutConfigurations']['showSecondaryMenuHeader']) {
    $cmsSecondaryMenu = CmsHelper::BiHamburgerMenuRender(
        Yii::$app->menu->findAll([
            'depth' => 1,
            'container' => $secondaryMenu
        ]),
        $iconSubmenu,
        false
    );
}

$cmsDefaultMenu = Html::tag('ul', $cmsDefaultMenu, ['class' => 'navbar-nav' . ' ' . $cmsDefaultMenuCustomClass]);
$cmsSecondaryMenu = Html::tag('ul', $cmsSecondaryMenu, ['class' => 'navbar-nav' . ' ' . $cmsSecondaryMenuCustomClass]);

$cmsDefaultMenuFooter = Html::tag('ul', $cmsDefaultMenuFooter, ['class' => 'footer-list link-list' . ' ' . $cmsDefaultMenuCustomClass]);
$cmsFooterMenu = Html::tag('ul', $cmsFooterMenu, ['class' => 'footer-list link-list' . ' ' . $cmsFooterMenuCustomClass]);
$cmsFooterMenu = $cmsDefaultMenuFooter . $cmsFooterMenu;

$cmsPluginMenu = Html::tag('ul', $cmsPluginMenu, ['class' => 'navbar-nav' . ' ' . $cmsPluginMenuCustomClass]);

echo Yii::$app->get('layoutmanager')->renderMainLayout([
    'cmsDefaultMenu' => $cmsDefaultMenu,
    'cmsSecondaryMenu' => $cmsSecondaryMenu,
    'cmsFooterMenu' => $cmsFooterMenu,
    'cmsPluginMenu' => $cmsPluginMenu,
    'customBeavior' => $customBehavior,
    'currentAsset' => $currentAsset,
    'content' => $content,
    'searchAction' => $searchPage,
]);
