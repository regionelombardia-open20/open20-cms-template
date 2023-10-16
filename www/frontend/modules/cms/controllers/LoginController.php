<?php

namespace app\modules\cms\controllers;

use open20\amos\admin\models\UserProfile;
use open20\amos\mobile\bridge\modules\v1\models\AccessTokens;
use open20\amos\mobile\bridge\modules\v1\models\User as AmosUser;
use luya\admin\controllers\LoginController as BaseLoginController;
use luya\admin\models\User;
use luya\admin\models\UserLogin;
use luya\admin\models\UserOnline;
use Yii;
use yii\helpers\ArrayHelper;
use luya\admin\assets\Login;
use luya\helpers\Url;
use app\modules\cms\components\AdminUser;

class LoginController extends BaseLoginController
{

    /**
     *
     * @return array
     */
    public function getRules()
    {
        return
            ArrayHelper::merge(parent::getRules(),
                [
                    [
                        'allow' => true,
                        'actions' => ['login-amos', 'login-cms-admin'],
                        'roles' => ['?', '@'],
                    ],
        ]);
    }

    public function actionIndex($autologout = null)
    {     
        // redirect logged in users
        if (!Yii::$app->adminuser->isGuest) {
            
            //if(!AdminUser::isAdmin()){
                $home = (new \yii\db\Query())->select('id')->from('cms_nav')->where(['is_home' => 1])->one();
                if($home)
                    return $this->redirect(['/admin#!/template/cmsadmin~2Fdefault~2Findex/update/'.$home['id']]);
                else
                    return $this->redirect(['/admin#!/template/cmsadmin~2Fdefault~2Findex']);
            //}
            return $this->redirect(['/admin/default/index']);
        }
       
        $this->registerAsset(Login::class);
        
        $this->view->registerJs("observeLogin('#loginForm', '".Url::toAjax('admin/login/async')."', '".Url::toAjax('admin/login/async-token')."', '".Url::toAjax('admin/login/twofa-token')."');");
    
        UserOnline::clearList($this->module->userIdleTimeout);
        
        return $this->render('index', [
            'autologout' => $autologout,
            'resetPassword' => $this->module->resetPassword,
        ]);
    }
    
    /**
     *
     * @param type $secure_token
     * @return type
     */
    public function actionLoginAmos($secure_token = null)
    {

        if ($secure_token) {

            $amosuser = $this->findIdentityByAccessToken($secure_token);
            if (!is_null($amosuser)) {
                $user = $this->getCmsUser($amosuser);
                if (!is_null($user)) {
                    Yii::$app->adminuser->idParam = '__luyaAdmin_id';
                    if ($user && Yii::$app->adminuser->login($user)) {

                        $user->updateAttributes([
                            'force_reload' => false,
                            'login_attempt' => 0,
                            'login_attempt_lock_expiration' => null,
                            'auth_token' => Yii::$app->security->hashData(Yii::$app->security->generateRandomString(),
                                $user->password_salt),
                        ]);
                        // kill prev user logins
                        UserLogin::updateAll(['is_destroyed' => true],
                            ['user_id' => $user->id]);

                        // create new user login
                        $login = new UserLogin([
                            'auth_token' => $user->auth_token,
                            'user_id' => $user->id,
                            'is_destroyed' => false,
                        ]);
                        $login->save();

                        // refresh user online list
                        UserOnline::refreshUser($user, 'login');
                    }
                }
            }
        }
        echo 'jCallback'.'('."{'fullname' : '".Yii::$app->adminuser->idParam."','user_id' : '".$user->id."' }".')';
        return;
    }

    /**
     *
     * @param type $token
     * @return type
     */
    protected function findIdentityByAccessToken($token)
    {
        $Token = AccessTokens::findOne(['access_token' => $token]);

        if ($Token) {
            return $Token->user;
        }

        return null;
    }

    /**
     *
     * @param  $amosuser
     */
    protected function getCmsUser($amosuser)
    {
        $user = User::findOne(['email' => $amosuser->email]);
        if (is_null($user)) {
            /* @var $userProfile UserProfile */
            $userProfile         = $amosuser->userProfile;
            $user                = new User();
            $user->firstname     = $userProfile->nome;
            $user->lastname      = $userProfile->cognome;
            $user->email         = $amosuser->email;
            $salt                = \Yii::$app->security->generateRandomString();
            $pw                  = \Yii::$app->security->generatePasswordHash(''.$salt);
            $user->password      = $pw;
            $user->password_salt = $salt;
            $user->title         = 1;
            $user->is_deleted    = false;
            $user->save();
            /* var $command yii\db\Command */
            $command             = \Yii::$app->db->createCommand();

            $command->insert('{{%admin_user_group}}',
                [
                    'user_id' => $user->id,
                    'group_id' => 1,
            ])->execute();
        }
        return $user;
    }
    
    /**
     *
     * @param type $secure_token
     * @return type
     */
    public function actionLoginCmsAdmin($redirect = null)
    {

        $amosuser = Yii::$app->user->identity;
        $authTimeout = 3600 * 24 * 30;
        if(!empty(\Yii::$app->user->authTimeout)){
            $authTimeout = \Yii::$app->user->authTimeout;
        }
        if (!is_null($amosuser)) {
            $user = $this->getCmsUser($amosuser);
            if (!is_null($user)) {
                Yii::$app->adminuser->idParam = '__luyaAdmin_id';
                if ($user && Yii::$app->adminuser->login($user, $authTimeout)) {

                    $user->updateAttributes([
                        'force_reload' => false,
                        'login_attempt' => 0,
                        'login_attempt_lock_expiration' => null,
                        'auth_token' => Yii::$app->security->hashData(Yii::$app->security->generateRandomString(),
                            $user->password_salt),
                    ]);
                    // kill prev user logins
                    UserLogin::updateAll(['is_destroyed' => true],
                        ['user_id' => $user->id]);

                    // create new user login
                    $login = new UserLogin([
                        'auth_token' => $user->auth_token,
                        'user_id' => $user->id,
                        'is_destroyed' => false,
                    ]);
                    $login->save();

                    // refresh user online list
                    UserOnline::refreshUser($user, 'login');
                }
            }
        }
        if(empty($redirect)){
            $redirect = '/admin/login/index';
        }
        return $this->redirect($redirect);
    }
}