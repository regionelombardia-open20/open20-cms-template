<?php

namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\Module;
use app\modules\backendobjects\frontend\blockgroups\ElementiBaseGroup;


final class TabsPanelBlock extends \app\modules\uikit\BaseUikitBlock
{
    
    
    protected $component = "tabspanel";
    
    
    //put your code here
    public function admin() 
    {
        if(count($this->getVarValue('items', []))) {
            return $this->frontend();
        } else {
            return '<div><span class="block__empty-text">' . Module::t('no_content') . '</span></div>';
        }
    }

    public function name() {
        return Yii::t('backendobjects', 'block_module_backend_tabspanel');
    }

   /**
     * @inheritDoc
     */
    public function blockGroup()
    {
        return ElementiBaseGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'tab';
    }
}
