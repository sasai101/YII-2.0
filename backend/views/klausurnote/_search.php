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
        'action' => ['klausurnotelistview'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'Bezeichnung') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
