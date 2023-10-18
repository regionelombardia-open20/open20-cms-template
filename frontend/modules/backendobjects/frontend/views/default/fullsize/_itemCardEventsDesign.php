<?php

//$model->usePrettyUrl = true;

$userNotSignup = true;
$url = (isset($model->community_id)) ? '/community/join/open-join?id=' . $model->community_id : '/events/event/view?id=' . $model->id;
$urlCta = '/community/join/open-join?id=' . $model->community_id;

if($model->seats_management){
  $availableSeats = $model->getEventSeats()->andWhere(['status' => [EventSeats::STATUS_EMPTY, EventSeats::STATUS_TO_REASSIGN]])->count();
}


?>

<?=
  $this->render(
    '@vendor/open20/design/src/components/bootstrapitalia/views/bi-event',
    [
      'image' => $model->getModelImageUrl(),
      'dateHourStart' => $model->begin_date_hour,
      'title' => $model->title,
      'summary'  => $model->summary,
      'url' => $url,
      'urlCta' => $urlCta,
      'type' => $tag,
      'isPaid' => $model->paid_event,
      'availableSeats' => $availableSeats,
      'customlabelCreateView' => 'Visualizza evento',
      'customlabelCreateSubscribe' => 'Visualizza evento',
      'model' => $model,
      'actionModify' => '/events/event/update?id='.$model->id,
      'actionDelete' => '/events/event/delete?id='.$model->id,
    ]
  );
?>