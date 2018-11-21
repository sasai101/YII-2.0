<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\AbgabeSuchen $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="abgabe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'AbgabeID') ?>

    <?= $form->field($model, 'Benutzer_MarterikelNr') ?>

    <?= $form->field($model, 'Korrektor_MarterikelNr') ?>

    <?= $form->field($model, 'KorregierteZeit') ?>

    <?= $form->field($model, 'AbgabeZeit') ?>

    <?php // echo $form->field($model, 'GesamtePunkt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
