<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\UebungSuchen $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="uebung-search">

    <?php $form = ActiveForm::begin([
        'action' => ['alleuebungen'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Bezeichnung') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
