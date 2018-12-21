<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\KlausurnoteSuchen $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="klausurnote-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'KlausurnoteID') ?>

    <?= $form->field($model, 'Mitarbeiter_MarterikelNr') ?>

    <?= $form->field($model, 'Benutzer_MarterikelNr') ?>

    <?= $form->field($model, 'Note') ?>

    <?= $form->field($model, 'Bezeichnung') ?>

    <?php // echo $form->field($model, 'Punkt') ?>

    <?php // echo $form->field($model, 'KorregierteZeit') ?>

    <?php // echo $form->field($model, 'ModulID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
