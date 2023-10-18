<?php
namespace app\modules\cmsapi\frontend\utility\cmspageblock;

use app\modules\cmsapi\frontend\utility\CmsBlocksBuilder;

/**
 * Description of CmsUikitTestEditorPageBlock
 *
 */
class CmsUikitTextEditorPageBlock extends CmsTextEditorPageBlock
{

    public static function findBlocks($nav_item_page_id)
    {
        $id_block = static::findBlock(CmsBlocksBuilder::UIKITTEXTEDITOR);
        $blocks   = static::find()->
            andWhere(['nav_item_page_id' => $nav_item_page_id])->
            andWhere(['block_id' => $id_block->id])
            ->all();
        return $blocks;
    }
}