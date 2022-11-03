<?php

namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\BaseUikitBlock;
use app\modules\backendobjects\frontend\blockgroups\ElementiBaseGroup;

/**
 * Image Block.
 *
 */
final class ImageBlock extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    public $component = "image";

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
        return Yii::t('backendobjects', 'block_module_backend_image');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        if($this->getExtraValue('image')) {
            return $this->frontend();
        } else {
            return '<div><span class="block__empty-text">' . Yii::t('backendobjects', 'block_module_backend_image_no_content') . '</span></div>';
        }
    }
}
