<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Klausur */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="klausur-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Kreditpunkt')->textInput() ?>

    <?= $form->field($model, 'Pruefungsdatum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Raum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'Bezeichnung')->dropDownList(['Hauptklausur'=>'Hauptklausur', '1.Nachklausur'=>'1. Nachklausur', '2.Nachklausur'=>'2.Nachklausur', '3.Nachklausur'=>'3.Nachklausur']) ?>

    <?= $form->field($model, 'Max_Punkte')->textInput() ?>

    <?= $form->field($model, 'punkt1_0')->textInput() ?>

    <?= $form->field($model, 'punkt1_3')->textInput() ?>

    <?= $form->field($model, 'punkt1_7')->textInput() ?>

    <?= $form->field($model, 'punkt2_0')->textInput() ?>

    <?= $form->field($model, 'punkt2_3')->textInput() ?>
    
    <?= $form->field($model, 'punkt2_7')->textInput() ?>

    <?= $form->field($model, 'punkt3_0')->textInput() ?>

    <?= $form->field($model, 'punkt3_3')->textInput() ?>

    <?= $form->field($model, 'punkt3_7')->textInput() ?>

    <?= $form->field($model, 'punkt4_0')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>