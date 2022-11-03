<?php

namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\BaseUikitLayoutBlock;
use app\modules\backendobjects\frontend\blockgroups\ContenitoreGroup;

/**
 * Three Columns Layout Block : thirds, quarters-2-1-1, quarters-1-1-2, quarters-1-2-1, fixed-inner, fixed-outer
 *
 */
final class LayoutThreeColumnsBlock extends BaseUikitLayoutBlock
{
    public $isContainer = true;
    public $cacheEnabled = false;
    /**
     * @return array
     */
    public function availableLayouts() {
        return ['thirds', 'quarters-2-1-1', 'quarters-1-1-2', 'quarters-1-2-1', 'fixed-inner', 'fixed-outer'];
    }

    /**
     * @return string
     */
    public function defaultLayout() {
        return 'thirds';
    }

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Yii::t('backendobjects', 'block_module_three-columns-layout');
    }

    public function config(){
        $configs = parent::config();
        
        $vars = [
            ['var' => 'visibility', 
                 'label' => 'Visibilità del blocco', 
                 'description'=> 'Set visibility for all, only guest, only logged.',
                 'initvalue' => '', 
                 'type' => 'zaa-select', 'options' => [
                    ['value' => '', 'label' => 'Visibile a tutti'],
                    ['value' => 'guest', 'label' => 'Visibile solo ai non loggati'],
                    ['value' => 'logged', 'label' => 'Visibile solo ai loggati'],                      
                ],
            ],
            ['var' => 'cache', 
                 'label' => 'Enable cache',                 
                 'initvalue' => '', 
                 'type' => 'zaa-checkbox',
            ],
            ['var' => 'class', 
                 'label' => 'Class',                 
                 'initvalue' => '', 
                 'type' => 'zaa-text',
            ]
        ];
 
        array_push($configs['vars'], ...$vars);

        $this->cacheEnabled = $this->getVarValue('cache');

        return $configs;
    }
    
    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return ContenitoreGroup::class;
    }
    
    /**
     * @inheritdoc
     */
    public function admin()
    {
        return $this->frontend();
    }
}