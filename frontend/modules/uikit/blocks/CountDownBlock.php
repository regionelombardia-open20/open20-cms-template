<?php

namespace app\modules\uikit\blocks;

use app\modules\backendobjects\frontend\blockgroups\ElementiBaseGroup;
use app\modules\uikit\BaseUikitBlock;
use trk\uikit\Uikit;
use Yii;
use yii\helpers\VarDumper;


final class CountDownBlock extends BaseUikitBlock {
    /**
     * @inheritdoc
     */
    public $cacheEnabled = true;
    
    /**
     * @inheritdoc
     */
    protected $component = "countdown";

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Yii::t('backendobjects', 'block_module_countdown_name');
    }
    
    public function blockGroup()
    {
        return ElementiBaseGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'hourglass_bottom';
    }

    

    public function frontend(array $params = array()) {

        $blockId = $this->getEnvOption('id');
        $params['blockItemId'] = $blockId;

        $configs = $this->getValues();
        $configs["id"] = Uikit::unique($this->component);
        $params['data'] = Uikit::configs($configs);
        
        return $this->view->render($this->getViewFileName('php'), $params, $this);
    }
    /**
     * @inheritdoc
     */
    public function admin()
    {
        return $this->frontend();
    }
}
