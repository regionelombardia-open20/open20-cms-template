<!DOCTYPE html>
<?php

use app\assets\SocialAsset;
use open20\amos\core\forms\ActiveForm;
use open20\amos\core\helpers\Html;

SocialAsset::register($this);

?>
<?php 

    $render = isset($data['for_logged']) && !empty($data['for_logged']) ? !\Yii::$app->user->isGuest : true;             
    if ($render):
        
?>

    <div>
        <?php
        //Uikit::trace($data);
        //Uikit::trace($debug);
        //Uikit::trace($request);
        //Uikit::trace($model->attributes());
        $form            = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data', 'autocomplete' => "off",'target'=>'_blank'],
                'encodeErrorSummary' => false,
                'fieldConfig' => ['errorOptions' => ['encode' => false, 'class' => 'help-block']]
        ]);
        ?>


        <div class="uk-form-controls">
            <div>
                <?= Html::hiddenInput('id', $data['id']); ?>
            </div>
            <?= Html::submitButton(!empty($data['submitlabel']) ? $data['submitlabel'] : 'Esporta i dati in un Excel',
                ['class' => 'btn btn-primary'])
            ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
<?php endif; ?>
