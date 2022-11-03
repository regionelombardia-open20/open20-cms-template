<?php

namespace app\modules\uikit\blocks;

use app\modules\backendobjects\frontend\blockgroups\FooterGroup;
use app\modules\uikit\BaseUikitBlock;
use trk\uikit\Module;
use Yii;


final class FooterHeadlineAnchorBlock  extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    protected $component = "headlineanchor";


    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return FooterGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Yii::t('backendobjects', 'block_module_backend_headline-anchor');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'format_size';
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        if($this->getVarValue('content')) {
            return $this->frontend();
        } else {
            return '<div><span class="block__empty-text">' . Module::t('no_content') . '</span></div>';
        }
    }
}
