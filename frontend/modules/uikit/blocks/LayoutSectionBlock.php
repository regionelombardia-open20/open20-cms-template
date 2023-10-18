<?php

namespace app\modules\uikit\blocks;

use app\modules\backendobjects\frontend\blockgroups\LegacyGroup;
use trk\uikit\Module;


final class LayoutSectionBlock extends \app\modules\uikit\BaseUikitBlock
{
    
    public $cacheEnabled = false;
    /**
     * @inheritdoc
     */
    protected $component = "layoutsection";

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Module::t('layoutsection');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'aspect_ratio';
    }

    /**
     * @inheritdoc
     */
    protected function getPlaceholders()
    {
        return [
            ['var' => 'content', 'cols' => $this->getExtraValue('content')]
        ];
    }

    public function extraVars()
    {
        $this->extraValues['content'] = 12;
        return parent::extraVars();
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        return '';
    }

    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return LegacyGroup::class;
    }
}