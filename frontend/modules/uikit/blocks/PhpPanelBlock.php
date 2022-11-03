<?php



namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\Module;
use app\modules\backendobjects\frontend\blockgroups\SviluppoGroup;



class PhpPanelBlock extends \app\modules\uikit\BaseUikitBlock
{
    
    public $cacheEnabled = false;
    /**
     * @inheritdoc
     */
    protected $component = "phppanel";

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
        return Yii::t('backendobjects', 'block_module_backend_phppanel');
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
    public function admin()
    {
        if(count($this->getVarValue('items', []))) {
            return $this->frontend();
        } else {
            return '<div><span class="block__empty-text">' . Module::t('no_content') . '</span></div>';
        }
    }
}