<?php

namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\BaseUikitBlock;
use luya\cms\helpers\BlockHelper;
use app\modules\backendobjects\frontend\blockgroups\ElementiBaseGroup;

/**
 * Margin Top/Bottom block with Paragraph.
 *
 * @since 1.0.0
 */
final class SpacingBlock extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    public $cacheEnabled = true;
    
    protected function getSpacings()
    {
        return [
            1 => Yii::t('backendobjects', 'block_spacing_small_space'),
            2 => Yii::t('backendobjects', 'block_spacing_medium_space'),
            3 => Yii::t('backendobjects', 'block_spacing_large_space'),
        ];
    }
    
    public function blockGroup()
    {
        return ElementiBaseGroup::class;
    }
    
    /**
     * @inheritdoc
     */
    public function name()
    {
        return Yii::t('backendobjects', 'block_module_block_spacing_name');
    }
    
    /**
     * @inheritdoc
     */
    public function getIsDirtyDialogEnabled()
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'format_line_spacing';
    }

    /**
     * @inheritdoc
     */
    public function config()
    {
        return [
            'vars' => [
                [
                    'var' => 'spacing',
                    'label' => Yii::t('backendobjects', 'block_spacing_spacing_label'),
                    'initvalue' => 1,
                    'type' => self::TYPE_SELECT,
                    'options' => BlockHelper::selectArrayOption($this->getSpacings()),
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        return [
            'spacingLabel' => $this->getSpacings()[$this->getVarValue('spacing', 1)],
        ];
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        return '<span class="block__empty-text">{{ extras.spacingLabel }}</span>';
    }
}
