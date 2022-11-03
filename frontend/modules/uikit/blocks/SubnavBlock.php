<?php

namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\BaseUikitBlock;
use app\modules\uikit\Module;
use app\modules\backendobjects\frontend\blockgroups\ElementiAvanzatiGroup;



final class SubnavBlock extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    public $component = "subnav";

    public function disable()
    {
        return true;
    }
    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return ElementiAvanzatiGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Yii::t('backendobjects', 'block_module_backend_subnav-advanced');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'more_horiz';
    }

    /**
     * @inheritdoc
     */
    public function frontend(array $params = array())
    {
        if(count($this->getVarValue('items', []))) {
            return parent::frontend($params);
        } else {
            return "";
        }
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        if($output = $this->frontend()) {
            return $output;
        } else {
            return '<div><span class="block__empty-text">' . Module::t('no_content') . '</span></div>';
        }
    }
}
