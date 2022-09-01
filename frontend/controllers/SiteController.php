<?php
/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\basic\template
 * @category   CategoryName
 */

namespace app\controllers;

use luya\admin\models\Config;
use open20\amos\cwh\AmosCwh;
use luya\cms\helpers\Url;
use luya\cms\menu\QueryOperatorFieldInterface;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use amos\userauth\models\UserLoginForm;

/**
 * Class SiteController
 * @package frontend\controllers
 */
class SiteController extends Controller
{

    const USERAUTH_CONFIG_REDIRECT_NAV_ID = 'userauth_redirect_nav_id';
    const USERAUTH_CONFIG_AFTER_LOGIN_NAV_ID = 'userauth_afterlogin_nav_id';
    const NOPERMISSION_CONFIG_REDIRECT_NAV_ID ='nopermission_redirect_nav_id';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'login','privacy-policy'],
                'rules' => [
                    [
                        'actions' => ['login','privacy-policy'],
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Logs in a user.
     * @return string|Response
     */
    public function actionLogin($redir = null)
    {
        if (!Yii::$app->user->isGuest && \Yii::$app->user->id != Yii::$app->params['platformConfigurations']['guestUserId']) {
            return Yii::$app->response->redirect(Url::home(true));
        }

        $navItem = Yii::$app->menu->find()->where([QueryOperatorFieldInterface::FIELD_NAVID => Config::get(self::USERAUTH_CONFIG_REDIRECT_NAV_ID)])->with([
                'hidden'])->one();


        // redirect to the given nav item
        return Yii::$app->response->redirect($navItem->getLink());
    }

    /**
     * Logs out the current user.
     * @return Response
     */
    public function actionLogout($redir = null)
    {
        Yii::$app->user->logout();
        $referrer = \Yii::$app->request->referrer;
        if($redir){
            return $this->redirect($redir);
        }
        return $this->redirect($referrer ? $referrer : \Yii::$app->params['platform']['frontendUrl']);

    }
    
    /**
     * 
     */
    public function actionToMenuUrl($url)
    {

        $moduleCwh = AmosCwh::instance();
        if (!is_null($moduleCwh)) {
            $moduleCwh->resetCwhScopeInSession();
        }
        return Yii::$app->controller->redirect($url);
    }

    /**
     *
     */
    public function actionPrivacyPolicy()
    {
        return $this->redirect('/privacy-policy');
    }
    
}