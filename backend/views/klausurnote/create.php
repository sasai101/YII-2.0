<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\Pjax;
/**
 * @var yii\web\View $this
 * @var common\models\Klausurnote $model
 */

?>

<div class="klausurnote-create">
    <!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Titel -->
	<div>
		<h3>
			Neue Klausurnote erstellen
		</h3>
	</div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>

    <div class="klausurnote-form">
    
        <?php $form = ActiveForm::begin([
            'enableAjaxValidation'=>true
        ]); ?>
    
        <?= $form->field($model, 'Benutzer_MarterikelNr')->textInput() ?>
    
        <?= $form->field($model, 'Punkt')->textInput() ?>
    
    
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    
        <?php ActiveForm::end(); ?>

	</div>

</div>