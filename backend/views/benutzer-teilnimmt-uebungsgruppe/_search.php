<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\BenutzerTeilnimmtUebungsgruppeSuchen $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="benutzer-teilnimmt-uebungsgruppe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Benuter_MarterikelNr') ?>

    <?= $form->field($model, 'UebungsgruppeID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
