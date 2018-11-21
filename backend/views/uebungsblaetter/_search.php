<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\UebungsblaetterSuchen $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="uebungsblaetter-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'UebungsblatterID') ?>

    <?= $form->field($model, 'UebungsID') ?>

    <?= $form->field($model, 'UebungsNr') ?>

    <?= $form->field($model, 'Anzahl_der_Aufgabe') ?>

    <?= $form->field($model, 'Deadline') ?>

    <?php // echo $form->field($model, 'Ausgabedatum') ?>

    <?php // echo $form->field($model, 'Datein') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
