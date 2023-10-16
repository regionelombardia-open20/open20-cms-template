<?php

namespace app\modules\uikit\blocks;

use app\modules\backendobjects\frontend\blockgroups\LegacyGroup;
use app\modules\uikit\Module;


final class AccordionPlusBlock extends \app\modules\uikit\BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    protected $component = "accordionplus";

    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return LegacyGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Module::t('accordionplus');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'line_weight';
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        if(count($this->getVarValue('items', []))) {
            return $this->frontend();
        } else {
            return '<div><span class="block__empty-text">' . Module::t('no_content') . '</span></div>';
        }
    }
}
