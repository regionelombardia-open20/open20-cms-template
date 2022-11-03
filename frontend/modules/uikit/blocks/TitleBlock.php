<?php

namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\BaseUikitBlock;
use app\modules\backendobjects\frontend\blockgroups\ElementiBaseGroup;

/**
 * Heading-Title Block.
 *
 * @since 1.0.0
 */
final class TitleBlock extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    public $cacheEnabled = true;

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Yii::t('backendobjects', 'block_module_title_name');
    }
    
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
    public function icon()
    {
        return 'format_size';
    }

    /**
     * @inheritdoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'content', 'label' => Yii::t('backendobjects', 'block_title_content_label'), 'type' => self::TYPE_TEXT],
                ['var' => 'headingType', 'label' => Yii::t('backendobjects', 'block_title_headingtype_label'), 'type' => self::TYPE_SELECT, 'initvalue' => 'h1', 'options' => [
                        ['value' => 'h1', 'label' => Yii::t('backendobjects', 'block_title_headingtype_heading') . ' 1'],
                        ['value' => 'h2', 'label' => Yii::t('backendobjects', 'block_title_headingtype_heading') . ' 2'],
                        ['value' => 'h3', 'label' => Yii::t('backendobjects', 'block_title_headingtype_heading') . ' 3'],
                        ['value' => 'h4', 'label' => Yii::t('backendobjects', 'block_title_headingtype_heading') . ' 4'],
                        ['value' => 'h5', 'label' => Yii::t('backendobjects', 'block_title_headingtype_heading') . ' 5'],
                    ],
                ],
            ],
            'cfgs' => [
                ['var' => 'cssClass', 'label' => Yii::t('backendobjects', 'block_cfg_additonal_css_class'), 'type' => self::TYPE_TEXT],
            ]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function admin()
    {
        return '{% if vars.content is not empty %}<{{vars.headingType}}>{{ vars.content }}</{{vars.headingType}}>{% else %}<span class="block__empty-text">' . Yii::t('backendobjects', 'block_title_no_content') . '</span>{% endif %}';
    }
}
