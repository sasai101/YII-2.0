<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Uebungsblaetter $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="uebungsblaetter-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'UebungsID' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Uebungs ID...']],

            'UebungsNr' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Uebungs Nr...']],

            'Anzahl_der_Aufgabe' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Anzahl Der  Aufgabe...']],

            'Datein' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Datein...', 'maxlength' => 225]],

            'Deadline' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Deadline...']],

            'Ausgabedatum' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Ausgabedatum...']],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
