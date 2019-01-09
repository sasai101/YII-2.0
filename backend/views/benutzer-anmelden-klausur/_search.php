<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\BenutzerAnmeldenKlausurSuchen $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="benutzer-anmelden-klausur-search">

    <?php $form = ActiveForm::begin([
        'action' => ['klausuranmeldunglistview'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Bezeichnung') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
