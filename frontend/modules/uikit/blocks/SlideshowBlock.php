<?php

namespace app\modules\uikit\blocks;

use Yii;
use trk\uikit\Module;
use app\modules\backendobjects\frontend\blockgroups\ElementiBaseGroup;


final class SlideshowBlock extends \app\modules\uikit\BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    public $component = "slideshow";

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
        return Yii::t('backendobjects', 'block_module_backend_new-slideshow');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'burst_mode';
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
