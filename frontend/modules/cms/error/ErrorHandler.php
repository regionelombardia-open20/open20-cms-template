<?php

namespace app\modules\cms\error;

use Yii;

class ErrorHandler extends \yii\web\ErrorHandler //luya\web\ErrorHandler
{
    public $transferException = false;

    protected function renderException($exception)
    {
        if (Yii::$app instanceof \open20\amos\core\applications\CmsApplication) {
            if (!Yii::$app->request->isAdmin) {
                $url          = Yii::$app->getRequest()->url;
                $redirectPage = 500;
                if ($exception->statusCode == 404) {
                    $redirectPage = 404;
                } else if ($exception->statusCode == 403) {
                    if (\Yii::$app->user->isGuest) {
                        $redirectPage = 'login';
                        if (!empty(\Yii::$app->params['linkConfigurations']) && !empty(\Yii::$app->params['linkConfigurations']['loginLinkCommon'])) {
                            $redirectPage = \Yii::$app->params['linkConfigurations']['loginLinkCommon'];
                        }
                    } else {
                        $redirectPage = 403;
                    }
                }
                if (Yii::$app->has('response')) {
                    $response          = Yii::$app->getResponse();
                    // reset parameters of response to avoid interference with partially created response data
                    // in case the error occurred while sending the response.
                    $response->isSent  = false;
                    $response->stream  = null;
                    $response->data    = null;
                    $response->content = null;
                } else {
                    $response = new Response();
                }
                $result = \Yii::$app->controller->redirect(["/$redirectPage", 'redir' => $url]);

                $response->send();
            }
        }
    }
}