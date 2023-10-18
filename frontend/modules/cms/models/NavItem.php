<?php

namespace app\modules\cms\models;

use app\modules\cms\admin\Module;
use open20\amos\attachments\behaviors\FileBehavior;
use yii\helpers\ArrayHelper;
use Yii;

class NavItem extends \luya\cms\models\NavItem {

    /**
     * Before create event.
     */
    public function beforeCreate() {
        $this->timestamp_create = time();
        $this->timestamp_update = 0;
        $this->create_user_id = Module::getAuthorUserId();
        $this->update_user_id = Module::getAuthorUserId();
        $this->slugifyAlias();
    }

    /**
     * Before update event.
     */
    public function eventBeforeUpdate() {
        $this->timestamp_update = time();
        $this->update_user_id = Module::getAuthorUserId();
        $this->slugifyAlias();
    }

    public function rules() {
        return \yii\helpers\ArrayHelper::merge(parent::rules(),
                        [
                            [['seo_image'], 'file', 'extensions' => 'jpg,jpeg,png,gif,webp'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return ArrayHelper::merge(parent::behaviors(), [
                    'fileBehavior' => [
                        'class' => FileBehavior::className()
                    ],
        ]);
    }

    public function attributeLabels() {
        return ArrayHelper::merge(
                        parent::attributeLabels(),
                        ['seo_image' => \Yii::t('amosapp', 'Immagine')]);
    }

}
