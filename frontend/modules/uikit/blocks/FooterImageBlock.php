<?php

namespace app\modules\uikit\blocks;

use app\modules\backendobjects\frontend\blockgroups\FooterGroup;
use app\modules\uikit\BaseUikitBlock;
use Yii;

final class FooterImageBlock extends BaseUikitBlock {

    /**
     * @inheritdoc
     */
    public $component = "image";

    /**
     * @inheritdoc
     */
    public function blockGroup() {
        return FooterGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function name() {
        return Yii::t('backendobjects', 'block_module_backend_image');
    }

    /**
     * @inheritdoc
     */
    public function icon() {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function admin() {
        if ($this->getExtraValue('image')) {
            return $this->frontend();
        } else {
            return '<div><span class="block__empty-text">' . Yii::t('backendobjects', 'block_module_backend_image_no_content') . '</span></div>';
        }
    }

}
