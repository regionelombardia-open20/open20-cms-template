<?php

use app\modules\backendobjects\frontend\Module;

$route  = "#";
$cls    = $model->className();
$module = Module::getInstance();

$realModel = $cls::findOne($model->id);
if (!is_null($realModel)) {
    if (property_exists($realModel, 'usePrettyUrl')) {
        $realModel->usePrettyUrl = true;
    }
    $route = $realModel->getFullViewUrl();
}
?>

<?=
$this->render(
    '@vendor/open20/design/src/components/bootstrapitalia/views/bi-search-results-item',
    [
    'url' => $route,
    'type' => $realModel->getGrammar()->getModelLabel(),
    'titleLink' => '',
    'title' => $realModel->title,
    'description' => $realModel->getDescription(200)
    ]
);
?>