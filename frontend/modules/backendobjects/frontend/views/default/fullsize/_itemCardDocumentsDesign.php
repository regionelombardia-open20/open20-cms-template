<?php

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
    '@vendor/open20/design/src/components/bootstrapitalia/views/bi-document',
    [
      'title' => $model->titolo,
      'url' => '/documenti/documenti/view?id=' . $model->id,
      'fileName' => $documentMainFile->name,
      'fileUrl' => $fileUrl,
      'type' => $documentMainFile->type,
      'size' => $model->documentMainFile->size%1024 . 'Kb',
    ]
  );
?>