<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Einzelaufgabe $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="einzelaufgabe-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'AbgabeID' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Abgabe ID...']],

            'UebungsblaetterID' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Uebungsblaetter ID...']],

            'AufgabeNr' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Aufgabe Nr...']],

            'Max.Punkt' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Max  Punkt...']],

            'Text' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => 'Enter Text...','rows' => 6]],

            'Datein' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => 'Enter Datein...','rows' => 6]],

            'Punkte' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Punkte...']],

            'Bewertung' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Bewertung...', 'maxlength' => 255]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
