<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Klausurnote $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="klausurnote-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'Mitarbeiter_MarterikelNr' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Mitarbeiter  Marterikel Nr...']],

            'Benutzer_MarterikelNr' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Benutzer  Marterikel Nr...']],

            'Bezeichnung' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Bezeichnung...', 'maxlength' => 255]],

            'Punkt' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Punkt...']],

            'Note' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Note...']],

            'KorregierteZeit' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Korregierte Zeit...']],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
