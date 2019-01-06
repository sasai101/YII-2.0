<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;

/**
 * @var yii\web\View $this
 * @var common\models\Benutzer $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="benutzer-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            //'Benutzername' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Benutzername...', 'maxlength' => 255]],

            //'auth_key' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Auth Key...', 'maxlength' => 32]],

            //'password_hash' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Password Hash...', 'maxlength' => 255]],
            
            'file' => ['type' => Form::INPUT_FILE],

            'email' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Email...', 'maxlength' => 255]],

            //'created_at' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Created At...']],

            //'updated_at' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Updated At...']],

            //'MarterikelNr' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Marterikel Nr...']],

            //'password_reset_token' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Password Reset Token...', 'maxlength' => 255]],

            'Vorname' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Vorname...', 'maxlength' => 255]],

            'Nachname' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Nachname...', 'maxlength' => 255]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
