<?php

namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\BaseUikitBlock;
use app\modules\uikit\Module;
use app\modules\backendobjects\frontend\blockgroups\ElementiBaseGroup;


final class LinkPanelBlock extends BaseUikitBlock {

    /**
     * @inheritdoc
     */
    protected $component = "linkpanel";

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
        return Yii::t('backendobjects', 'block_module_backend_linkpanel');
    }

    /**
     * @inheritdoc
     */
    public function icon() {
        return 'line_weight';
    }

    /**
     * @inheritdoc
     */
    public function admin() {
        if (strlen($this->getVarValue('text_content'))) {
            $button = $this->frontend();
            $button = str_replace("<a", "<button", $button);
            $button = str_replace("</a>", "</button>", $button);
            return $button;

        } else {
            return '<div><span class="block__empty-text">' . Yii::t('backendobjects', 'block_module_backend_linkpanel_no_content') . '</span></div>';
        }
    }
    
    public function getContrastColor($hexcolor){
        
        $r = hexdec(substr($hexcolor, 1, 2));
        $g = hexdec(substr($hexcolor, 3, 2));
        $b = hexdec(substr($hexcolor, 5, 2));
        $yiq = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;
        
        return ($yiq >= 128) ? '#343a40' : 'white';
    }
    
    public function extraVars(){
        return [
            'style' => $this->getStyle(),                   
        ];
    }
    
    public function getStyle(){
        
        $return = '';
        
        $background = $this->getVarValue('button_background');
        $color = $this->getVarValue('text_color');

        $style = [];
        if($background){
            $style[] = "background-color:$background";
          
            if($color)
                $style[] = "color:$color";
            else
                $style[] = "color:{$this->getContrastColor($background)}";
                
            $return = implode(';',$style);
            
        }else{
            if($color)
                $style[] = "color:$color";
        }

        return $return;
    }

}
