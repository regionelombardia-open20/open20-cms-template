<?php

use open20\amos\core\utilities\CurrentUser;
use Yii;

$model->usePrettyUrl = true;

$image = null;
foreach ($viewFields as $field) {
    if ($field->type == 'IMAGE') {
        $image = (!is_null($model[$field->name])) ? $model[$field->name]->getWebUrl('square_medium', false, true) : '/img/img_default.jpg';
    } else if (!empty($field['type']) && $field['type'] == 'IMAGE') {
        $image = (!is_null($model[$field['name']])) ? $model[$field['name']]->getWebUrl('square_medium', false, true) : '/img/img_default.jpg';
    }
}

$url = '';
if ($detailPage) {
    $url = Yii::$app->getModule('backendobjects')::getSeoUrl($model->getPrettyUrl(), $blockItemId);
} else {
    $url = $model->getFullViewUrl();
}
?>

<?=
$this->render(
    '@vendor/open20/design/src/components/bootstrapitalia/views/bi-organizzazioni',
    [
    'title' => $model->getTitle(),
    'url' => $url,
    'actionModify' => '/organizzazioni/profilo/update?id='.$model->id,
    'actionDelete' => '/organizzazioni/profilo/delete?id='.$model->id,
    'removeLink' => CurrentUser::isPlatformGuest()
    ]
);
?>