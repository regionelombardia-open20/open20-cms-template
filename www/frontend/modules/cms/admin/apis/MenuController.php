<?php

namespace app\modules\cms\admin\apis;

use Yii;
use yii\db\Query;
use luya\admin\Module;
use app\modules\cms\components\AdminUser;

/**
 * Admin Menu API, provides all menu items and dashabord informations for a node or the entire system.
 *
 * @since 1.0.0
 */
class MenuController extends \luya\admin\apis\MenuController
{    
    /**
     * Get all dashabord items for a given node.
     *
     * @param integer $nodeId The id of the node to find all items from.
     * @return array
     */
    public function actionDashboard($nodeId)
    {
        $isAdmin = AdminUser::isAdmin();
        if(!$isAdmin)
            return [];
        
        $data = Yii::$app->adminmenu->getNodeData($nodeId);
        $accessList = [];

        // verify if no permissions has ben seet for this know or no groups are available trough permissions issues.
        if (!isset($data['groups'])) {
            return [];
        }
        
        foreach ($data['groups'] as $groupvalue) {
            foreach ($groupvalue['items'] as $row) {
                if ($row['permissionIsApi']) {
                    try {
                        $row['alias'] = Yii::t($data['moduleId'], $row['alias'], [], Yii::$app->language);
                    } catch (\Exception $e) {
                        // not translation found, use original alias name
                    }
                    $accessList[$row['permissionApiEndpoint']] = $row;
                }
            }
        }

        $log = [];

        $query = (new Query())
        ->select(['timestamp_create', 'api', 'user_id', 'admin_ngrest_log.id', 'is_update', 'is_delete', 'is_insert', 'admin_user.firstname', 'admin_user.lastname'])
        ->from('{{%admin_ngrest_log}}')
        ->leftJoin('{{%admin_user}}', '{{%admin_ngrest_log}}.user_id = {{%admin_user}}.id')
        ->orderBy(['timestamp_create' => SORT_DESC])
        ->limit(100)
        ->where([
            'and',
            ['in', 'api', array_keys($accessList)],
            ['!=', 'user_id', 0],
        ]);

        if (!$this->module->dashboardLogDisplayApiUserData) {
            $query->andWhere(['=', 'is_api_user', 0]);
        }

        foreach ($query->all() as $row) {
            $api = $accessList[$row['api']];
            $date = mktime(0, 0, 0, date('n', $row['timestamp_create']), date('j', $row['timestamp_create']), date('Y', $row['timestamp_create']));
            if ($row['is_update']) {
                $message = Module::t('dashboard_log_message_edit', ['container' => $api['alias']]);
            } elseif ($row['is_insert']) {
                $message = Module::t('dashboard_log_message_add', ['container' => $api['alias']]);
            } elseif ($row['is_delete']) {
                $message = Module::t('dashboard_log_message_delete', ['container' => $api['alias']]);
            }
            $log[$date][] = [
                'name' => $row['firstname'].' '.$row['lastname'],
                'is_update' => $row['is_update'],
                'is_insert' => $row['is_insert'],
                'is_delete' => $row['is_delete'],
                'timestamp' => $row['timestamp_create'],
                'alias' => $api['alias'],
                'message' => $message,
                'icon' => $api['icon'],
            ];
        }

        $array = [];

        krsort($log, SORT_NUMERIC);

        foreach ($log as $day => $values) {
            $array[] = [
                'day' => $day,
                'items' => $values,
            ];
        }

        return $array;
    }
}
