<?php
use open20\amos\core\utilities\CurrentUser;
use open20\amos\admin\AmosAdmin;
//$model->usePrettyUrl = true;

$documentMainFile = $model->getDocumentMainFile();
$fileUrl = '';
if ($documentMainFile != null) {
  $fileUrl = '/attachments/file/download?id=' . $documentMainFile->id . '&hash=' . $documentMainFile->hash;
}
if (!empty($model->link_document)) {
  $fileUrl = $model->link_document;
}
?>


<?=
  $this->render(
    '@vendor/open20/design/src/components/bootstrapitalia/views/bi-document-item',
    [
      'title' => $model->titolo,
      'nameSurname' => $model->createdUserProfile->nomeCognome,
      'urlAvatar' => '/'.AmosAdmin::getModuleName().'/user-profile/view?id='.$model->createdUserProfile->id,
      'imageAvatar' => $model->createdUserProfile->getAvatarUrl('table_small'),
      'url' => '/documenti/documenti/view?id=' . $model->id,
      'fileName' => $documentMainFile->name,
      'nameFile' =>  $documentMainFile->name,
      'fileUrl' => $fileUrl,
      'type' => $documentMainFile->type,
      'typeFolder' => $model->is_folder,
      'description' =>  $model->descrizione_breve,
      'size' => $model->documentMainFile->size%1024,
      'date' => $model->created_at,
      'model' => $model,
      'actionModify' => '/documenti/documenti/update?id='.$model->id,
      'actionDelete' => 'documenti/documenti/delete?id=1'.$model->id
    ]
  );
?>