<?php

namespace app\modules\uikit\blocks;

use app\modules\backendobjects\frontend\blockgroups\ElementiBaseGroup;
use app\modules\cms\models\Nav;
use app\modules\uikit\BaseUikitBlock;
use app\modules\uikit\menu\MenuItem;
use luya\admin\models\Group;
use luya\cms\models\NavContainer;
use trk\uikit\Uikit;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\VarDumper;

class MenuBlock extends BaseUikitBlock {

    private $blocks = ['\app\modules\uikit\blocks\MenuBlock'];

    /**
     * @inheritdoc
     */
    protected $component = "menucomponent";
    protected $itemData = [];
    private $groups;

    /**
     * Get all groups as singleton instance.
     *
     * @return ActiveRecord
     */
    private function getGroups() {
        if ($this->groups === null) {
            $this->groups = Group::find()->all();
        }

        return $this->groups;
    }

    /**
     * @inheritdoc
     */
    public function blockGroup() {
        return ElementiBaseGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function name() {
        return Yii::t('backendobjects', 'block_module_menu');
    }

    /**
     * @inheritdoc
     */
    public function icon() {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function admin() {

        return $this->frontend();
    }

    public function frontend(array $params = array()) {

        $blockId = $this->getEnvOption('id');
        $params['blockItemId'] = $blockId;

        $configs = $this->getValues();
        $configs["id"] = Uikit::unique($this->component);
        $params['data'] = Uikit::configs($configs);
        $params['html'] = $this->getHtmlMenu($params['data']['menu']);
        return VarDumper::dumpAsString($params);
        return $this->view->render($this->getViewFileName('php'), $params, $this);
    }

    private function getHtmlMenu($nav_id) {
        $html = "";
        $nav = Nav::findOne(['id' => $nav_id]);
        if (!is_null($nav)) {
            $container = $nav->navContainer;
            $this->getMenuItems($container, $nav->id);
            /* @var $item MenuItem */
            foreach ($this->itemData as $item) {
                $html .= $item->renderOpen();
                $html .= $item->renderClose();
            }
        }
        return $html;
    }

    /**
     * 
     * @param NavContainer $container
     * @param type $parentNavId
     * @param type $parentGroup
     * @param type $index
     */
    private function getMenuItems(NavContainer $container, $parentNavId = 0, $parentGroup = [], $index = 1) {

        $navs = $container->getNavs()->andWhere(['parent_nav_id' => $parentNavId])->all();

        foreach ($navs as $nav) {
            if (empty($nav->activeLanguageItem)) {
                continue;
            }
            $item = new MenuItem($nav);
            $item->loadSons();
            $this->itemData[] = $item;
        }
    }

}
