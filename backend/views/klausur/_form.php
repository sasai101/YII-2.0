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

            '1.0' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 1 0...']],

            '1.3' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 1 3...']],

            '1.7' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 1 7...']],

            '2.0' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 2 0...']],

            '2.3' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 2 3...']],

            '3.0' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 3 0...']],

            '3.3' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 3 3...']],

            '3.7' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 3 7...']],

            '4.0' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 4 0...']],

            '5.0' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter 5 0...']],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
