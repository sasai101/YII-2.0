<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Uebungsgruppe $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="uebungsgruppe-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'UebungsID' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Uebungs ID...']],

            'Tutor_MarterikelNr' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Tutor  Marterikel Nr...']],

            'Anzahl_der_Personen' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Anzahl Der  Personen...']],

            'GruppenNr' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Gruppen Nr...']],

            'Max_Person' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Max  Person...']],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
