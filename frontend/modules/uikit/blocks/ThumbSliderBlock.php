<?php

namespace app\modules\uikit\blocks;

use app\modules\uikit\BaseUikitBlock;
use app\modules\uikit\Module;
use app\modules\backendobjects\frontend\blockgroups\ElementiBaseGroup;

final class ThumbSliderBlock extends BaseUikitBlock {

    protected $component = "thumbslider";

    //put your code here
    public function admin() {
        return '<div><span class="block__empty-text"><img src="/img/preview_cms/thumbslider-preview.png"></span></div>';
    }

    public function name() {
        return Module::t('Thumbslider');
    }

    /**
     * @inheritDoc
     */
    public function blockGroup() {
        return ElementiBaseGroup::class;
    }

    public function icon() {
        return 'view_module';
    }

}
