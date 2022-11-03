<?php

namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\BaseUikitBlock;
use app\modules\backendobjects\frontend\blockgroups\ElementiBaseGroup;

/**
 * DescriptionList Block.
 *
 */
final class DescriptionListBlock extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    protected $component = "description-list";

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
        return Yii::t('backendobjects', 'block_module_backend_description-list');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'view_list';
    }

    /**
     * @inheritdoc
     */
    public function frontend(array $params = array())
    {
        if(count($this->getVarValue('items', []))) {
            return parent::frontend($params);
        } else {
            return "";
        }
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        if($output = $this->frontend()) {
            return $output;
        } else {
            return '<div><span class="block__empty-text">' . Yii::t('backendobjects', 'block_module_backend_description-list_no_content') . '</span></div>';
        }
    }
}
