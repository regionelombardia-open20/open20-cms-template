<?php

namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\BaseUikitBlock;
use app\modules\backendobjects\frontend\blockgroups\SocialGroup;
use yii\httpclient\Client;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * Social Block.
 *
 */
final class SocialWallBlock extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    //public $component = "socialwall";
    
    public function disable() {
        return true;
    }
    

    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return SocialGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Yii::t('backendobjects', 'block_module_block_socialwall');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'share';
    }
    
    public function config()
    {
        return [
            'vars' => [
                [
                    'var' => 'template', 
                    'label' => Yii::t('backendobjects', 'Scegli il layout della tua sezione'), 
                    'initvalue' => '1', 
                    'description'=> 'Le dimensioni e la formattazione del layout riguardano gli schermi desktop. Per schermi mobile ogni colonna avrà larghezza 100%. La colonna di sinistra conterrà i post di facebook (instagram (se esistono), l\'altra quelli di twitter (se esistono).',
                    'type' => 'zaa-radio', 
                    'options' => [
                        ['value' => 0, 'label' => 'Layout con una colonna (larghezza 100% su desktop e mobile)','image'=>'/img/layout_columns_template/1col.png'],
                        ['value' => 1, 'label' => 'Layout con due colonne (larghezza 50% su desktop, 100% mobile)','image'=>'/img/layout_columns_template/2col.png'],
                        ['value' => 2, 'label' => 'Layout con due colonne (larghezza 67%-33% desktop e 100% mobile)','image'=>'/img/layout_columns_template/66-33.png'],
                        ['value' => 3, 'label' => 'Layout con due colonne (larghezza 33%-67% desktop e 100% mobile)','image'=>'/img/layout_columns_template/33-66.png'],
                        
                    ],
                ],
                [
                    'var' => 'posts', 
                    'label' => Yii::t('backendobjects', 'Post trovati'), 
                    'type' => 'zaa-social-search', 
                    'options' => $this->socialContent(),
                    'description'=> 'Post social trovati per il termine di ricerca inserito.',
                ],
                [
                    'var' => 'visibility',
                    'label' => 'Visibilità del blocco',
                    'description' => 'Imposta la visibilità della sezione.',
                    'initvalue' => '',
                    'type' => 'zaa-select', 'options' => [
                        ['value' => '', 'label' => 'Visibile a tutti'],
                        ['value' => 'guest', 'label' => 'Visibile solo ai non loggati'],
                        ['value' => 'logged', 'label' => 'Visibile solo ai loggati'],
                    ],
                ],
                [
                    'var' => 'addclass',
                    'label' => 'Visibilità per profilo',
                    'description' => 'Imposta la visibilità della sezione in base al profilo dell\'utente loggato',
                    'type' => 'zaa-multiple-inputs',
                    'options' => [
                        [
                            'var' => 'class',
                            'type' => 'zaa-select',
                            'initvalue' => '',
                            'options' => BaseUikitBlock::getClasses(),
                        ]
                    ],
                ],
            
            ],
            
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        $template = $this->getVarValue('template');
        $array = [];
        
        switch($template){
            case 0:
                $array = [    
                    ['class' => 'col-xs-12 col-md-12','social'=>'instagram'],
                    ['class' => 'col-xs-12 col-md-12','social'=>'twitter'],
                ];
            break;
            case 1:
                $array = [    
                    ['class' => 'col-xs-12 col-md-6','social'=>'instagram'],
                    ['class' => 'col-xs-12 col-md-6','social'=>'twitter'],
                ];
            break;
        
            case 2:
                $array = [    
                    ['class' => 'col-xs-12 col-md-8','social'=>'instagram'],
                    ['class' => 'col-xs-12 col-md-4','social'=>'twitter'],
                ];
            break;

            case 3:
                $array = [    
                    ['class' => 'col-xs-12 col-md-4','social'=>'instagram'],
                    ['class' => 'col-xs-12 col-md-8','social'=>'twitter'],
                ];
            break;
            
        }
        
        return [
            'template' => $array,
        ];
    }

    public function socialContent()
    {
       
        $posts = $this->getVarValue('posts');
       
        $data = [
            'items' => [],
        ];
       
        foreach($posts as $post){
                       
            $exist = array_search($post['id'], array_column($data['items'], 'id'));                    
            if($exist === false)
                $data['items'][] = [
                    'id' => $post['id'], 
                    'value' => $post['value'], 
                    'label' => $post['value'], 
                    'social' => $post['social'], 
                    'image' => $post['image'],
                    'user'=> $post['user'],
                    'user_icon' => $post['user_icon'],
                    'date' => $post['date'],
                    'link' => $post['link'],
                    'user_link' => $post['user_link'],
                    'tot_share' => $post['tot_share'],
                    'tot_comments' => $post['tot_comments'],
                    'tot_like' => $post['tot_like'],
                ];
        }
       
        return $data;
    }
 
    /**
     * @inheritdoc
     */
    public function frontend(array $params = array())
    {
       
        return parent::frontend($params);
        
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        
        if($output = $this->frontend()) {
            return $output;
        } else {
            return '<div><span class="block__empty-text">' . Yii::t('backendobjects', 'block_module_block_socialwall_no_content') . '</span></div>';
        }
    }
}
