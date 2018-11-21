<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\BenutzerTeilnimmtUebungsgruppe $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="benutzer-teilnimmt-uebungsgruppe-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'Benuter_MarterikelNr' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Benuter  Marterikel Nr...']],

            'UebungsgruppeID' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Uebungsgruppe ID...']],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
