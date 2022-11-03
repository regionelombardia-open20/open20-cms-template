<?php

namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\BaseUikitBlock;
use app\modules\uikit\Module;
use app\modules\backendobjects\frontend\blockgroups\ElementiAvanzatiGroup;
use trk\uikit\Uikit;

class SiteMapBlock extends BaseUikitBlock
{

    public $cacheEnabled = true;

    public function init()
    {
        parent::init();
        
    }
    /**
     * @inheritdoc
     */
    protected $component = "sitemap";

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
        return Yii::t('backendobjects', 'block_module_backend_sitemap');
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
        return $this->frontend();
    }

    public function frontend(array $params = array())
    {
       if (!Uikit::element('data', $params, '')) {
            $configs        = $this->getValues();
            $configs["id"]  = Uikit::unique($this->component);
            $params['data'] = Uikit::configs($configs);
        }
        return $this->view->render($this->getViewFileName('php'), $params, $this);
    }

    
}