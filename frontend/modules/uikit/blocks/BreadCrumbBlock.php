<?php

namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\Module;
use app\modules\backendobjects\frontend\blockgroups\ElementiAvanzatiGroup;
use app\modules\uikit\BaseUikitBlock;



class BreadCrumbBlock extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    protected $component = "breadcrumb";

    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return ElementiAvanzatiGroup::className();
    }

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Yii::t('backendobjects', 'block_module_backend_breadcrumb');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'data_usage';
    }

    /**
     * @inheritdoc
     */
    public function admin(array $params = array())
    {   
        
        return "Breadcrumb of page.";
    }

    /**
     * 
     * @param array $params
     * @return string
     */
    public function frontend(array $params = array())
    {
        
        $params['items'] = Yii::$app->menu->current->with(['hidden'])->teardown;
        return $this->view->render($this->getViewFileName('php'), $params, $this);
    }
}
