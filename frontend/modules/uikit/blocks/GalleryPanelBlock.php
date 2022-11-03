<?php

namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\BaseUikitBlock;
use app\modules\uikit\Module;
use app\modules\backendobjects\frontend\blockgroups\ElementiBaseGroup;



final class GalleryPanelBlock extends BaseUikitBlock
{
    protected $component = "gallerypanel";

    //put your code here
    public function admin()
    {
        if (count($this->getVarValue('items', []))) {
            return $this->frontend();
        } else {
            return '<div><span class="block__empty-text">'.Module::t('no_content').'</span></div>';
        }
    }

    public function name()
    {
        return Yii::t('backendobjects', 'block_module_backend_gallerypanel');
    }

    /**
     * @inheritDoc
     */
    public function blockGroup()
    {
        return ElementiBaseGroup::class;
    }

    public function icon()
    {
        return 'view_module';
    }
}