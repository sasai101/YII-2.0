<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\UebungsgruppeSuchen $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="uebungsgruppe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'UebungsgruppeID') ?>

    <?= $form->field($model, 'UebungsID') ?>

    <?= $form->field($model, 'Tutor_MarterikelNr') ?>

    <?= $form->field($model, 'Anzahl_der_Personen') ?>

    <?= $form->field($model, 'GruppenNr') ?>

    <?php // echo $form->field($model, 'Max_Person') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
