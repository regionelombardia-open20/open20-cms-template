<?php

use open20\amos\core\utilities\CurrentUser;
use open20\amos\admin\AmosAdmin;

//$model->usePrettyUrl = true;

$image = null;
foreach ($viewFields as $field) {
    if ($field->type == 'IMAGE') {
        $image = (!is_null($model[$field->name])) ? $model[$field->name]->getWebUrl('square_medium', false, true) : '/img/img_default.jpg';
    }
}

$partecipants = $model->commentsUsersAvatarsAll();
?>

<?=
$this->render(
    '@vendor/open20/design/src/components/bootstrapitalia/views/bi-discussions',
    [
    'image' => $image,
    'date' => $model->created_at,
    'title' => $model->getTitle(),
    'url' => $model->getFullViewUrl(),
    'nameSurname' => $model->createdUserProfile->nomeCognome,
    'hideNameSurname' => true,
    'showTooltip' => true,
    'imageAvatar' => $model->createdUserProfile->getAvatarUrl('table_small'),
    'urlAvatar' => '/'.AmosAdmin::getModuleName().'/user-profile/view?id='.$model->createdUserProfile->id,
    //'additionalInfoAvatar' => (!empty($model->createdUserProfile->prevalentPartnership) ? $model->createdUserProfile->prevalentPartnership->name : ''),
    'communityTitle' => \open20\amos\core\utilities\CwhUtility::getTargetsString($model),
    'numbersOfAnswer' => $model->getDiscussionComments()->count(),
    'numbersOfVisits' => $model->hints,
    'lastActivityDate' => $model->updated_at,
    'avatarsGroup' => $partecipants,
    'partecipantNumber' => count($partecipants),
    'actionModify' => '/discussioni/discussioni-topic/update?id='.$model->id,
    'actionDelete' => '/discussioni/discussioni-topic/delete?id='.$model->id,
    'numberExpose' => 4,
    'widthColumn' => 'col-12',
    'model' => $model,
    'removeLink' => CurrentUser::isPlatformGuest()
    ]
);
?>

