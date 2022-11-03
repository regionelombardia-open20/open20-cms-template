<?php

namespace app\modules\cms\admin\apis;

use luya\cms\base\BlockInterface;
use Yii;
use luya\cms\models\BlockGroup;
use app\modules\cms\components\AdminUser;

/**
 * Admin Api delievers common api tasks like blocks and layouts.
 *
 * @since 1.0.0
 */
class AdminController extends \luya\cms\admin\apis\AdminController
{   
    /**
     * Get all blocks which can be dropped into a page grouped by group.
     *
     * @return array An array with list of groups with an array key "blocks" containing the blocks.
     */
    public function actionDataBlocks()
    {    
       
        $favs = Yii::$app->adminuser->identity->setting->get("blockfav", []);
               
        $isAdmin = AdminUser::isAdmin();
        
        $groups = [];
        foreach (BlockGroup::find()->with(['blocks'])->all() as $blockGroup) {
            
            $blocks = [];

            if($blockGroup->identifier == 'development-group' && !$isAdmin)
                continue;
                 
            
            foreach ($blockGroup->blocks as $block) {
                      
                $groupPosition = null;
                
                if ($block->is_disabled) {
                    continue;
                }
                // create the block object
                /** @var BlockInterface $obj */
                $obj = $block->getObject(0, 'admin');

                // check if in hidden blocks
                if (!$obj || in_array(get_class($obj), $this->module->hiddenBlocks)) {
                    continue;
                }
                                 
                if ($groupPosition == null) {
                    $groupObject = Yii::createObject($obj->blockGroup());
                    $groupPosition = $groupObject->getPosition();
                    
                }
                         
                $blocks[] = [
                    'id' => $block->id,
                    'name' => $obj->name(),
                    'icon' => $obj->icon(),
                    'preview_enabled' => $obj->renderAdminPreview() ? true : false,
                    'full_name' => ($obj->icon() === null) ? $obj->name() : '<i class="material-icons">'.$obj->icon().'</i> <span>'.$obj->name().'</span>',
                    'favorized' => array_key_exists($block->id, $favs),
                    'newblock' => 1,
                    'groupPosition'=> $groupPosition,
                ];
            }

           
            if (empty($blocks)) {
                continue;
            }
            
            // extend the group element b
            $group = $blockGroup->toArray([]);
            $group['name'] = $blockGroup->groupLabel;
            $group['is_fav'] = 0;
            $group['toggle_open'] = (int) Yii::$app->adminuser->identity->setting->get("togglegroup.{$group['id']}", 1);

            $groups[] = [
                'groupPosition' => $blocks[0]['groupPosition'],
                'group' => $group,
                'blocks' => $blocks,
            ];
        }
    
        if (!empty($favs)) {
            $favblocks = [];
            foreach ($favs as $fav) {
                $favblocks[] = $fav;
            }
            
            array_unshift($groups, [
                'group' => [
                    'toggle_open' => (int) Yii::$app->adminuser->identity->setting->get("togglegroup.99999", 1),
                    'id' => '99999',
                    'is_fav' => 1,
                    'name' => \luya\cms\admin\Module::t('block_group_favorites'), // translation stored in admin module
                    'identifier' => 'favs',
                    'position' => 0,
                ],
                'groupPosition' => 0,
                'blocks' => $favblocks,
            ]);
        }
       
        return $groups;
    }
}
