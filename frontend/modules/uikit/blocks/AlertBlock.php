<?php

namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\BaseUikitBlock;
use app\modules\backendobjects\frontend\blockgroups\ElementiAvanzatiGroup;

/**
 * Alert Block.
 *
 */
final class AlertBlock extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    protected $component = "alert";

    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return ElementiAvanzatiGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Yii::t('backendobjects', 'block_module_alert');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'warning';
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        if($this->getVarValue('title') || $this->getVarValue('content')) {
            return $this->frontend();
        } else {
            return '<div><span class="block__empty-text">' . Yii::t('backendobjects', 'block_module_alert_no_content') . '</span></div>';
        }
    }
}
