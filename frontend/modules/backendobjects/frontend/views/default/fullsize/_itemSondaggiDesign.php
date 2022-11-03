<?php 

//$model->usePrettyUrl = true;
use yii\helpers\Url;
/**
 * @var \open20\amos\sondaggi\models\Sondaggi $model
 * @var \open20\amos\core\record\CmsField[] $viewFields
 */

$image = $model->getModelImageUrl('square_medium', false, '/img/img_default.jpg', false, true);

$url = $model->getFullViewUrl();
if (\Yii::$app->user->isGuest) {
    $moduleSondaggi = Yii::$app->getModule('sondaggi');
    if ($moduleSondaggi->enableFrontendCompilation || $moduleSondaggi->forceOnlyFrontend) {
        $url = Url::to(['/sondaggi/frontend/compila', 'id' => $model->id]);
    }
}

?>

<?=
$this->render(
    '@vendor/open20/design/src/components/bootstrapitalia/views/bi-sondaggi',
    [
    'image' => $image,
    'dateStart' => $model->created_at,
    'dateEnd' => $model->close_date,
    'title' => $model->getTitle(),
    'description' => $model->descrizione,
    'url' => $url,
    'participants' => $model->getNumeroPartecipazioni(),
    'pollState' => $model->hasWorkflowStatus() ? $model->getWorkflowStatus()->getLabel() : '',
    'contentScopesAvatar' => \open20\amos\core\utilities\CwhUtility::getTargetsString($model),
    'model' => $model,
    'actionModify' => '/sondaggi/sondaggi/update?id=' . $model->id,
    'actionDelete' => '/sondaggi/sondaggi/delete?id=' . $model->id,
    ]
);
?>
