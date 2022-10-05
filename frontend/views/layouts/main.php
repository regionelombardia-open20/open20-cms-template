<?php

use app\modules\seo\frontend\behaviors\LuyaSeoBehavior;
use app\components\CmsHelper;
use open20\design\assets\BootstrapItaliaDesignAsset;
use yii\helpers\Html;
use luya\admin\models\Lang;
use Yii;

/* @var $this luya\web\View */
/* @var $content string */ 

$this->attachBehavior('seo', LuyaSeoBehavior::className());

$currentAsset = BootstrapItaliaDesignAsset::register($this);
$iconSubmenu = '<svg class="icon icon-expand icon-sm"><use xlink:href="' . $currentAsset->baseUrl . '/node_modules/bootstrap-italia/dist/svg/sprite.svg#it-expand"></use></svg>';

$searchPage = (isset(\Yii::$app->params['linkConfigurations']['pageSearchLinkCommon'])) ? \Yii::$app->params['linkConfigurations']['pageSearchLinkCommon'] : '/it/ricerca';

$myOpenMenu = (isset(\Yii::$app->params['menuCmsConfigurations']['myOpenCmsMenu'])) ? \Yii::$app->params['menuCmsConfigurations']['myOpenCmsMenu'] : 'myopen';
$mainMenu = (isset(\Yii::$app->params['menuCmsConfigurations']['mainCmsMenu'])) ? \Yii::$app->params['menuCmsConfigurations']['mainCmsMenu'] : 'default';
$mainEngMenu = (isset(\Yii::$app->params['menuCmsConfigurations']['mainEngCmsMenu'])) ? \Yii::$app->params['menuCmsConfigurations']['mainEngCmsMenu'] : 'default-eng';
$secondaryMenu = (isset(\Yii::$app->params['menuCmsConfigurations']['secondaryCmsMenu'])) ? \Yii::$app->params['menuCmsConfigurations']['secondaryCmsMenu'] : 'secondary';
$footerMenu = (isset(\Yii::$app->params['menuCmsConfigurations']['footerCmsMenu'])) ? \Yii::$app->params['menuCmsConfigurations']['footerCmsMenu'] : 'footer';

$cmsMyOpenMenuCustomClass = 'cms-menu-container-myopen';
$cmsDefaultMenuCustomClass = 'cms-menu-container-default';
$cmsDefaultEngMenuCustomClass = 'cms-menu-container-default cms-menu-container-default-eng';
$cmsSecondaryMenuCustomClass = 'cms-menu-container-secondary';
$cmsFooterMenuCustomClass = 'cms-menu-container-footer';
$cmsPluginMenuCustomClass = 'cms-menu-container-plugin';

$cmsMyOpenMenu = CmsHelper::BiHamburgerMenuRender(
    Yii::$app->menu->findAll([
        'depth' => 1,
        'container' => $myOpenMenu
    ]),
    $iconSubmenu,
    false,
    $currentAsset
);

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

if (isset(\Yii::$app->params['menuCmsConfigurations']['secondaryCmsMenu'])) {
    $cmsSecondaryMenu = CmsHelper::BiHamburgerMenuRender(
        Yii::$app->menu->findAll([
            'depth' => 1,
            'container' => $secondaryMenu
        ]),
        $iconSubmenu,
        false
    );
}

/**
 * if eng tree default menu is different to ita tree default menu
 */
if (isset(\Yii::$app->params['menuCmsConfigurations']['mainEngCmsMenu'])) {
    $cmsEngDefaultMenu = CmsHelper::BiHamburgerMenuRender(
        Yii::$app->menu->findAll([
            'depth' => 1,
            'container' => $mainEngMenu
        ]),
        $iconSubmenu,
        false
    );
    $cmsEngDefaultMenuFooter = CmsHelper::BiHamburgerMenuRender(
        Yii::$app->menu->findAll([
            'depth' => 1,
            'container' => $mainEngMenu
        ]),
        $iconSubmenu,
        true,
        $currentAsset
    );
}

/**
 * check lang for default menu and footer menu
 */
$language_code = Yii::$app->composition['langShortCode'];
$language = Lang::findOne(['short_code' => $language_code]);

if ($language_code == 'en'){
    $cmsDefaultMenu = Html::tag('ul', $cmsEngDefaultMenu, ['class' => 'navbar-nav' . ' ' . $cmsDefaultEngMenuCustomClass]);
    $cmsDefaultMenuFooter = Html::tag('ul', $cmsEngDefaultMenuFooter, ['class' => 'footer-list link-list' . ' ' . $cmsDefaultEngMenuCustomClass]);
} else {
    $cmsDefaultMenu = Html::tag('ul', $cmsDefaultMenu, ['class' => 'navbar-nav' . ' ' . $cmsDefaultMenuCustomClass]);
    $cmsDefaultMenuFooter = Html::tag('ul', $cmsDefaultMenuFooter, ['class' => 'footer-list link-list' . ' ' . $cmsDefaultMenuCustomClass]);
}

/**
 * myOpenMenu first default menu
 */

$cmsMyOpenMenu = Html::tag('ul', $cmsMyOpenMenu, ['class' => 'navbar-nav' . ' ' . $cmsMyOpenMenuCustomClass]);

$cmsDefaultMenu = $cmsMyOpenMenu . $cmsDefaultMenu;

$cmsSecondaryMenu = Html::tag('ul', $cmsSecondaryMenu, ['class' => 'navbar-nav' . ' ' . $cmsSecondaryMenuCustomClass]);

$cmsPluginMenu = Html::tag('ul', $cmsPluginMenu, ['class' => 'navbar-nav' . ' ' . $cmsPluginMenuCustomClass]);

/**
 * footer menu = first level default menu + footer
 */
$cmsFooterMenu = Html::tag('ul', $cmsFooterMenu, ['class' => 'footer-list link-list' . ' ' . $cmsFooterMenuCustomClass]);
$cmsFooterMenu = $cmsDefaultMenuFooter . $cmsFooterMenu;


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
