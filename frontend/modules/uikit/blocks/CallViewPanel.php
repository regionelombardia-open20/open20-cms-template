<?php
namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\BaseUikitBlock;
use app\modules\uikit\Module;
use app\modules\backendobjects\frontend\blockgroups\SviluppoGroup;
use trk\uikit\Uikit;

/**
 * Description of CallViewPanel
 *
 */
final class CallViewPanel extends BaseUikitBlock {
    
    public $cacheEnabled = false;
    
   /**
     * @inheritdoc
     */
    protected $component = "callviewpanel";

    /**
     * @inheritdoc
     */
    public function blockGroup() {
        return SviluppoGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function name() {
        return Yii::t('backendobjects', 'block_module_backend_callviewpanel');
    }

    /**
     * @inheritdoc
     */
    public function icon() {
        return 'line_weight';
    }

    /**
     * @inheritdoc
     */
    public function admin() {
        if (strlen($this->getVarValue('text'))) {
            return $this->frontend();
        } else {
            return '<div><span class="block__empty-text">' . Module::t('no_content') . '</span></div>';
        }
    }
    
    /**
     * @param array $params
     * @return mixed
     */
    public function frontend(array $params = array())
    {
        if(!Uikit::element('data', $params, '')) {
            $configs = $this->getValues();
            $configs["id"] =  Uikit::unique($this->component);
            $params['data'] = Uikit::configs($configs);
            $params['debug'] = $this->config();
            $params['filters'] = $this->filters;
        }
        return $this->view->render($this->getVarValue('viewName'), $params, $this);
    }

	/**
	 * @inheritdoc
	 */
    public function getViewPath()
    {
        return  $this->getVarValue('viewPath');
    }
}
