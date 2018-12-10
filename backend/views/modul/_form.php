<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Modul $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="modul-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'Bezeichnung' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Bezeichnung...', 'maxlength' => 255]],
            
            'Maximale_Person' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Maximale Anzahl der Person...']],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
