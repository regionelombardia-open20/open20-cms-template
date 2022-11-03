<?php

namespace app\modules\cms\components;

use Yii;

class AdminUser extends \luya\admin\components\AdminUser
{
    public function init()
    {
        parent::init();
        $this->idParam = '__luyaAdmin_id';

    }
    
    public static function isAdmin(){
        
        $user_id = Yii::$app->adminuser->id; 
        $isAdmin = false;
        
        $query = (new \yii\db\Query)->from('admin_user_group')->where(['user_id'=>$user_id])->one();             
        if($query && $query['group_id'] == 1){ 
            $isAdmin = true;
        }
        
        return $isAdmin;
    }
}