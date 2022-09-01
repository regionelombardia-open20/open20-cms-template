<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    Open20Package
 */

namespace app\modules\uikit\blocks;

use app\modules\uikit\Module;
use app\modules\uikit\Uikit;
use open20\amos\admin\AmosAdmin;
use open20\amos\admin\models\UserProfile;
use luya\cms\frontend\blockgroups\MainGroup;

/**
 * Class MyProfileBlock
 * @package app\modules\uikit\blocks
 */
class MyProfileBlock extends \app\modules\uikit\BaseUikitBlock
{
    /**
     * @var AmosAdmin $adminModule
     */
    public $adminModule;

    /**
     * @var UserProfile $model
     */
    public $model;

    public $totCounter = 0;

    protected $component = "myprofile";

    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();
        $this->cacheEnabled = false;
    }

    /**
     * @return mixed|string
     * @throws \yii\base\InvalidConfigException
     */
    public function admin()
    {
        return $this->frontend();
    }

    public function name()
    {
        return Module::t('Il mio profilo');
    }

    /**
     * @inheritDoc
     */
    public function blockGroup()
    {
        return MainGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'person';
    }

    /**
     * @param array $params
     * @return mixed|string
     * @throws \yii\base\InvalidConfigException
     */
    public function frontend(array $params = array())
    {
        if (!\Yii::$app->user->isGuest) {
            $this->adminModule = AmosAdmin::instance();
            /** @var UserProfile $userProfileModel */
            $userProfileModel = $this->adminModule->createModel('UserProfile');
            $this->model = $userProfileModel::find()->andWhere(['user_id' => \Yii::$app->user->id])->one();

            if (!Uikit::element('data', $params, '')) {
                $configs = $this->getValues();
                $configs["id"] = Uikit::unique($this->component);
                $params['data'] = Uikit::configs($configs);
                $params['debug'] = $this->config();
                $params['filters'] = $this->filters;
            }

            $params['model'] = $this->model;
            $params['adminModule'] = $this->adminModule;
            $params['avatarUrl'] = $this->getAvatar();

            return $this->view->render('@vendor/open20/design/src/components/bootstrapitalia/views/bi-widget-myprofile-head', $params);
        }

        return '';
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->model->getAvatarUrl('card_users');
    }
}
