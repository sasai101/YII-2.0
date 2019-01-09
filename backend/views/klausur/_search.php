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
        'action' => ['klausurlistview'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'Bezeichnung') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
