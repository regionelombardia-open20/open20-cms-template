<?php

namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\BaseUikitBlock;
use luya\cms\frontend\Module;
use app\modules\backendobjects\frontend\blockgroups\SviluppoGroup;
use luya\cms\base\PhpBlock;

/**
 * HTML Block
 *
 * @since 1.0.0
 */
final class HtmlBlock extends BaseUikitBlock
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
        return SviluppoGroup::class;
    }
    
    /**
     * @inheritdoc
     */
    public function name()
    {
        return Yii::t('backendobjects', 'block_module_backend_html');
    }
    
    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'code';
    }

    /**
     * @inheritdoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'html', 'label' => Yii::t('backendobjects', 'block_html_html_label'), 'type' => self::TYPE_TEXTAREA],
            ],
            'cfgs' => [
                ['var' => 'raw', 'label' => Yii::t('backendobjects', 'block_html_cfg_raw_label'), 'type' => self::TYPE_CHECKBOX]
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        $message =  Module::t('block_html_no_content');
        return <<<EOT
    	{% if vars.html is empty %}
    		<span class="block__empty-text">{$message}</span>{% else %}
    		{% if cfgs.raw == 1 %}
    			{{ vars.html | raw }}
    		{% else %}
                <code>{{ vars.html | escape }}</code>
    		{% endif %}
    	{% endif %}
EOT;
    }
}
