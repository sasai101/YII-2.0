<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var common\models\Klausurnote $model
 */

?>
<div class="klausurnote-update">

    <!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Titel -->
	<div>
		<h3>
			<?= Html::encode($model->klausur->Bezeichnung); ?>
		</h3>
	</div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<div class="row">
		<div><b>&nbsp&nbsp&nbsp&nbspMarterikelNr: <?php echo $model->Benutzer_MarterikelNr?></b></div>
		<div><b>&nbsp&nbsp&nbsp&nbspName: <?php echo $model->benutzerMarterikelNr->Vorname." ".$model->benutzerMarterikelNr->Nachname?></b></div>
	</div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>

    <div class="klausurnote-form">
    
        <?php $form = ActiveForm::begin([
            'id' => 'form-id',
            'enableAjaxValidation'=>true
        ]); ?>
    
        <?= $form->field($model, 'Punkt')->textInput() ?>
    
    
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    
        <?php ActiveForm::end(); ?>

	</div>

</div>
