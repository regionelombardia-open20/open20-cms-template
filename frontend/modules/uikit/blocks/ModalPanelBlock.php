<?php

namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\BaseUikitBlock;
use app\modules\uikit\Module;
use app\modules\backendobjects\frontend\blockgroups\ElementiBaseGroup;



final class ModalPanelBlock extends BaseUikitBlock {

    /**
     * @inheritdoc
     */
    protected $component = "modalpanel";

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
        return Yii::t('backendobjects', 'block_module_backend_modalpanel');
    }

    /**
     * @inheritdoc
     */
    public function icon() {
        return 'web_asset';
    }

    /**
     * @inheritdoc
     */
    public function admin() {
        return $this->frontend();
        
    }

}
