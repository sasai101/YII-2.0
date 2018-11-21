<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Abgabe $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="abgabe-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'Benutzer_MarterikelNr' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Benutzer  Marterikel Nr...']],

            'Korrektor_MarterikelNr' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Korrektor  Marterikel Nr...']],

            'KorregierteZeit' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Korregierte Zeit...']],

            'AbgabeZeit' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Abgabe Zeit...']],

            'GesamtePunkt' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Gesamte Punkt...']],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
