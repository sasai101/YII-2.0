<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\KlausurSuchen $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="klausur-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'KlausurID') ?>

    <?= $form->field($model, 'Mitarbeiter_MarterikelNr') ?>

    <?= $form->field($model, 'ModulID') ?>

    <?= $form->field($model, 'Kreditpunkt') ?>

    <?= $form->field($model, 'Pruefungsdatum') ?>

    <?php // echo $form->field($model, 'Raum') ?>

    <?php // echo $form->field($model, 'Bezeichnung') ?>

    <?php // echo $form->field($model, 'Max_Punkte') ?>

    <?php // echo $form->field($model, '1.0') ?>

    <?php // echo $form->field($model, '1.3') ?>

    <?php // echo $form->field($model, '1.7') ?>

    <?php // echo $form->field($model, '2.0') ?>

    <?php // echo $form->field($model, '2.3') ?>

    <?php // echo $form->field($model, '3.0') ?>

    <?php // echo $form->field($model, '3.3') ?>

    <?php // echo $form->field($model, '3.7') ?>

    <?php // echo $form->field($model, '4.0') ?>

    <?php // echo $form->field($model, '5.0') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
