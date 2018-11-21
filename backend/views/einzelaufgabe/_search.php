<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\EinzelaufgabeSuchen $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="einzelaufgabe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'EinzelaufgabeID') ?>

    <?= $form->field($model, 'AbgabeID') ?>

    <?= $form->field($model, 'UebungsblaetterID') ?>

    <?= $form->field($model, 'AufgabeNr') ?>

    <?= $form->field($model, 'Text') ?>

    <?php // echo $form->field($model, 'Datein') ?>

    <?php // echo $form->field($model, 'Punkte') ?>

    <?php // echo $form->field($model, 'Bewertung') ?>

    <?php // echo $form->field($model, 'Max.Punkt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
