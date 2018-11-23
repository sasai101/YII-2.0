<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Klausur $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="klausur-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'Mitarbeiter_MarterikelNr' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Mitarbeiter  Marterikel Nr...']],

            'ModulID' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Modul ID...']],

            'Kreditpunkt' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Kreditpunkt...']],

            'Pruefungsdatum' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Pruefungsdatum...', 'maxlength' => 255]],

            'Raum' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Raum...', 'maxlength' => 255]],

            'Bezeichnung' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Bezeichnung...', 'maxlength' => 255]],

            'Max_Punkte' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Max  Punkte...']],

            'punkt1_0' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Punkt1 0...']],

            'punkt1_3' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Punkt1 3...']],

            'punkt1_7' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Punkt1 7...']],

            'punkt2_0' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Punkt2 0...']],

            'punkt2_3' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Punkt2 3...']],

            'punkt3_0' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Punkt3 0...']],

            'punkt3_3' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Punkt3 3...']],

            'punkt3_7' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Punkt3 7...']],

            'punkt4_0' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Punkt4 0...']],

            'punkt5_0' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Punkt5 0...']],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
