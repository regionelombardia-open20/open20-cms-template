<?php

namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\Module;
use app\modules\backendobjects\frontend\blockgroups\ElementiBaseGroup;

class AccordionAttachmentsBlock extends \app\modules\uikit\BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    protected $component = "accordionattachments";

    public function disable()
    {
        return true;
    }
    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return ElementiBaseGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Yii::t('backendobjects', 'block_module_backend_accordionattachments');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'attach_file';
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