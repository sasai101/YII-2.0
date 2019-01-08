<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UebungSuchen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uebung-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'UebungsID') ?>

    <?= $form->field($model, 'ModulID') ?>

    <?= $form->field($model, 'Mitarbeiter_MarterikelNr') ?>

    <?= $form->field($model, 'Bezeichnung') ?>

    <?= $form->field($model, 'Zulassungsgrenze') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
