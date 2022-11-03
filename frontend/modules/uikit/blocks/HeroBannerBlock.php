<?php

namespace app\modules\uikit\blocks;

use app\modules\backendobjects\frontend\blockgroups\ElementiBaseGroup;
use app\modules\uikit\BaseUikitBlock;
use Yii;

final class HeroBannerBlock extends BaseUikitBlock {

    public $cacheEnabled = false;

    /**
     * @inheritdoc
     */
    protected $component = "herobanner";

    /**
     * @inheritdoc
     */
    public function blockGroup() {
        return ElementiBaseGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function name() {
        return Yii::t('backendobjects', 'block_module_herobanner');
    }

    /**
     * @inheritdoc
     */
    public function icon() {
        return 'featured_play_list';
    }

    /**
     * @inheritdoc
     */
    public function admin(array $params = array()) {
        return $this->frontend();
    }

}
