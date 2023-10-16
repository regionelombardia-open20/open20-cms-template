<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\news
 * @category   CategoryName
 */

/**
 * @var yii\web\View $this
 * @var open20\amos\news\models\search\NewsSearch $model
 * @var yii\widgets\ActiveForm $form
 * @var bool $withoutSearch
 */

use backend\utility\Utility;
use open20\amos\news\AmosNews;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use open20\design\components\bootstrapitalia\ActiveForm;
use open20\amos\documenti\AmosDocumenti;
use open20\amos\documenti\models\DocumentiCategorie;
use kartik\datecontrol\DateControl;

/** @var AmosDocumenti $documentsModule */
$documentsModule = AmosDocumenti::instance();

/** @var DocumentiCategorie $documentiCategorieModel */
$documentiCategorieModel = $documentsModule->createModel('DocumentiCategorie');
$hidePubblicationDate = $documentsModule->hidePubblicationDate;
$hideSearchPubblicationDates = $documentsModule->hideSearchPubblicationDates;
?>
<div>
    <?php $form = ActiveForm::begin([
//        'action' => Yii::$app->controller->action->id,
        'method' => 'get',
        'options' => [
            'id' => 'documenti_form_' . $model->id,
            'class' => 'form',
            'enctype' => 'multipart/form-data',
        ]
    ]); ?>
    <div class="row">

        <div class="col-lg-4 ">
            <?php
            $attrSearch= 'titolo';
            if(property_exists($model,'genericText')){
                $attrSearch = 'genericText';
             }
             ?>

            <?= $form->field($model, $attrSearch)->textInput([
                'placeholder' => Yii::t('app', 'Argomenti, parole chiave, testo...'),
                'label' => Yii::t('app', 'Cerca')
            ])->label(Yii::t('app', 'Cerca')) ?>
        </div>

        <?php if ($documentsModule->enableCategories): ?>
            <div class="col-lg-3 col-md-4 form-group">
                <?= \open20\design\components\bootstrapitalia\Select::widget([
                    'model' => $model,
                    'attribute' => 'documenti_categorie_id',
                    'label' => Yii::t('app', 'Seleziona una categoria'),
                    'items' => ArrayHelper::map($documentiCategorieModel::find()->asArray()->all(), 'id', 'titolo'),
                    'options' => [
                        'id' => 'categorie-filter',
                        'placeholder' => Yii::t('app', 'Seleziona...'),
//                    'multiple' => true
                    ],
                ]); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($documentsModule->enableExtensionFilter) && $documentsModule->enableExtensionFilter): ?>
            <div class="col-lg-3 col-md-4 form-group">
                <?php
                $extensionsString = $documentsModule->whiteListFilesExtensions;
                $extensions = explode(',', $extensionsString);
                $ext = [];
                foreach ($extensions as $extension) {
                    $ext[$extension] = $extension;
                }
                ?>
                <?= \open20\design\components\bootstrapitalia\Select::widget([
                    'model' => $model,
                    'attribute' => 'extensions',
                    'label' => Yii::t('app', 'Seleziona una estensione'),
                    'items' => $ext,
                    'options' => [
                        'id' => 'extensions-filter',
                        'placeholder' => Yii::t('app', 'Seleziona...'),
//                    'multiple' => true,
                        'allowClear' => true
                    ],
                ]); ?>
            </div>
        <?php endif; ?>


        <?php if (!$hidePubblicationDate) { ?>
            <?php if (!$hideSearchPubblicationDates) { ?>
                <div class="col-sm-6 col-lg-4">
                    <?= $form->field($model, 'data_pubblicazione')->inputCalendar([])
                        ->label(AmosDocumenti::t('amosdocumenti', "#data_di_pubblicazione_dal")) ?>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <?= $form->field($model, 'dataPubblicazioneAl')
                        ->inputCalendar([])->label(AmosDocumenti::t('amosdocumenti', "#data_di_pubblicazione_al")) ?>
                </div>
            <?php } ?>
        <?php } ?>

        <?php
        $clearUrl = '/';
        $explode = explode('?', \Yii::$app->request->getUrl());
        if (!empty($explode)) {
            $clearUrl = $explode[0];
        } ?>
        <div class="col-lg-2 col-md-4 form-group text-md-right">
            <?= Html::a('<span class="mdi mdi-close"></span> <span class="d-lg-none">' . \Yii::t('app', 'Cancella filtri') . '</span>', $clearUrl, ['class' => 'btn btn-sm px-2 btn-outline-tertiary', 'title' => 'Cancella filtri']) ?>
            <?= Html::submitButton('<span class="mdi mdi-filter mr-1"></span>' . AmosNews::tHtml('amosnews', 'Filtra'), ['class' => 'btn btn-sm btn-tertiary', 'title' => \Yii::t('app', 'Applica filtri')]) ?>
        </div>


    </div>


    <?php ActiveForm::end(); ?>

</div>
