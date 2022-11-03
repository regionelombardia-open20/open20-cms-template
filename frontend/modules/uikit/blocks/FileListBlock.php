<?php

namespace app\modules\uikit\blocks;

use Yii;
use app\modules\uikit\BaseUikitBlock;
use luya\cms\helpers\BlockHelper;
use app\modules\backendobjects\frontend\blockgroups\ElementiBaseGroup;

/**
 * File list block.
 *
 * @since 1.0.0
 */
final class FileListBlock extends BaseUikitBlock
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
        return Yii::t('backendobjects', 'block_module_block_file_list_name');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'attachment';
    }

    /**
     * @inheritdoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'files', 'label' => Yii::t('backendobjects', "block_file_list_files_label"), 'type' => 'zaa-file-array-upload'],
            ],
            'cfgs' => [
                ['var' => 'showType', 'label' => Yii::t('backendobjects', "block_file_list_files_showtype_label"), 'initvalue' => 0, 'type' => 'zaa-select', 'options' => [
                        ['value' => '1', 'label' => Yii::t('backendobjects', "block_file_list_showtype_yes")],
                        ['value' => '0', 'label' => Yii::t('backendobjects', "block_file_list_showtype_no")],
                    ],
                ],
                ['var' => 'link_title', 'label' => Yii::t('backendobjects', "block_file_list_files_link_title"), 'type' => 'zaa-text', 'description' => 'Enter the document\'s link title attribute.'],
            ],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        return [
            'fileList' => BlockHelper::fileArrayUpload($this->getVarValue('files')),
        ];
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        return $this->frontend();
    }
}
