<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Uebung */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uebung-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ModulID')->textInput() ?>

    <?= $form->field($model, 'Mitarbeiter_MarterikelNr')->textInput() ?>

    <?= $form->field($model, 'Bezeichnung')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Zulassungsgrenze')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
