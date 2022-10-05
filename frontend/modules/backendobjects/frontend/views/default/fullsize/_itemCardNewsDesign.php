<?php

use open20\amos\news\utility\NewsUtility;
use open20\amos\core\utilities\CurrentUser;
use open20\amos\admin\AmosAdmin;

$model->usePrettyUrl = true;

$image = null;
foreach ($viewFields as $field) {
    if ($field->type == 'IMAGE') {
        $image = (!is_null($model[$field->name])) ? $model[$field->name]->getWebUrl('square_medium', false, true) : '/img/img_default.jpg';
    } else if(!empty($field['type']) && $field['type'] == 'IMAGE'){
		 $image = (!is_null($model[$field['name']])) ? $model[$field['name']]->getWebUrl('square_medium', false, true) : '/img/img_default.jpg';
	}
}

$hideCategory   = false;
$newsCategories = NewsUtility::getAllNewsCategories();
if ($newsCategories->count() == 1) {
    $hideCategory = true;
} else {
    $category = $model->newsCategorie->titolo;
    $customCategoryClass = 'mb-1 px-1 ' . ' ' . 'custom-category-bg-' . str_replace(' ','-',strtolower($category));
    $colorBgCategory = $model->newsCategorie->color_background;
    $colorTextCategory = $model->newsCategorie->color_text;
}
$url='';
if( $detailPage ){
    $url = Yii::$app->getModule('backendobjects')::getSeoUrl($model->getPrettyUrl(), $blockItemId);
}else{
	$url=$model->getFullViewUrl();
}

?>

<?=
$this->render(
    '@vendor/open20/design/src/components/bootstrapitalia/views/bi-news',
    [
    'category' => $category,
    'hideCategory' => $hideCategory,
    'customCategoryClass' => $customCategoryClass,
    'colorBgCategory' => $colorBgCategory,
    'colorTextCategory' => $colorTextCategory,
    'image' => $image,
    'date' => $model->data_pubblicazione,
    'title' => $model->getTitle(),
    'abstract' => $model->getShortDescription(),
    'description' => strip_tags($model->getDescription(true)),
    'url' => $url,
    'nameSurname' => $model->createdUserProfile->nomeCognome,
    'imageAvatar' => $model->createdUserProfile->getAvatarUrl('table_small'),
    'urlAvatar' => '/'.AmosAdmin::getModuleName().'/user-profile/view?id='.$model->createdUserProfile->id,
    'additionalInfoAvatar' => (!empty($model->createdUserProfile->prevalentPartnership) ? $model->createdUserProfile->prevalentPartnership->name : ''),
    'contentScopesAvatar' => \open20\amos\core\utilities\CwhUtility::getTargetsString($model),
    'model' => $model,
    'actionModify' => '/news/news/update?id='.$model->id,
    'actionDelete' => '/news/news/delete?id='.$model->id,
    'widthColumn' => 'col-lg-4 col-md-6',
    'removeLink' => CurrentUser::isPlatformGuest()
    ]
);
?>