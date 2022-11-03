<?php

namespace app\modules\uikit\blocks;

use Yii;
use luya\TagParser;
use app\modules\uikit\BaseUikitBlock;
use app\modules\backendobjects\frontend\blockgroups\ElementiBaseGroup;

/**
 * Paragraph Text Block.
 *
 * @since 1.0.0
 */
final class TextBlock extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    public $cacheEnabled = true;

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
        return Yii::t('backendobjects', 'block_module_text_name');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'format_align_left';
    }

    /**
     * @inheritdoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'content', 'label' => Yii::t('backendobjects', 'block_text_content_label'), 'type' => 'zaa-wysiwyg'],
            ],
            'cfgs' => [
                ['var' => 'cssClass', 'label' => Yii::t('backendobjects', 'block_cfg_additonal_css_class'), 'type' => 'zaa-text'],
            ]
        ];
    }

    /**
     * Get the text based on type input.
     */
    public function getText()
    {
        $text = $this->getVarValue('content');

        if ($this->getVarValue('textType', 0) == 1) {
            return TagParser::convertWithMarkdown($text);
        }

        return nl2br($text);
    }

    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        return [
            'text' => $this->getText(),
        ];
    }
    
    public function admin()
    {
        return '<p>{% if vars.content is empty %}<span class="block__empty-text">' . Yii::t('backendobjects', 'block_text_no_content') . '</span>'.
                '{% elseif vars.content is not empty and vars.textType == 1 %}{{ extras.text }}{% elseif vars.content is not empty %}{{ extras.text }}{% endif %}</p>';
    }
}
