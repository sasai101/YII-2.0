<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/**
 *
 * @var yii\web\View $this
 * @var common\models\Uebungsblaetter $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="uebungsblaetter-form">
    
    <?php $form = ActiveForm::begin([
        'enableAjaxValidation'=>true,
    ]); ?>
    
		<?= $form->field($model, 'Anzahl_der_Aufgabe')->textInput() ?>

		<?= $form->field($model, 'GesamtePunkte')->textInput() ?>

		<?=$form->field($model, 'Deadline')->widget('trntv\yii\datetime\DateTimeWidget', ['clientOptions' => ['minDate' => new \yii\web\JsExpression(time() + 60 * 60 * 60),'allowInputToggle' => true,'sideBySide' => true,'locale' => 'de','widgetPositioning' => ['horizontal' => 'auto','vertical' => 'auto']]])?>
	
		<?= $form->field($model, 'file')->fileInput() ?>
		
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>

</div>
