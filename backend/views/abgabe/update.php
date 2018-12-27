<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Abgabe $model
 */

$this->title = 'Abgabe';
$this->params['breadcrumbs'][] = ['label' => 'Alle Übungen', 'url' => ['uebungsgruppe/alleuebungen']];
$this->params['breadcrumbs'][] = ['label' => 'Alle Übungsgruppen', 'url' => ['uebungsgruppe/alleuebungsgruppe','id'=>$model->uebungsblaetter->uebungs->UebungsID]];
$this->params['breadcrumbs'][] = ['label' => 'Übungsgruppe'.$model->uebungsgruppen->GruppenNr, 'url'=>['uebungsgruppe/gruppendetails', 'id'=>$model->uebungsgruppen->UebungsgruppeID]];
$this->params['breadcrumbs'][] = ['label' => 'Alle Abgabe von Gruppe '.$model->uebungsgruppen->GruppenNr, 'url'=>['abgabe/index', 'UebungsgruppeID'=>$model->UebungsgruppenID, 'UebungsblaetterID'=>$model->UebungsblaetterID]];
$this->params['breadcrumbs'][] = 'Übungsblatt '.$model->uebungsblaetter->UebungsNr;
?>
<div class="abgabe-update">
	<div class="abgabe-index">
    <!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<div>
		<h2>
			Modul: <?php echo $model->uebungsblaetter->uebungs->modul->Bezeichnung ?>
		</h2>
	</div>
	
	<div>
		<h2>
			Übungsgruppe: <?php echo $model->uebungsgruppen->GruppenNr ?>
		</h2>
	</div>
	<!-- Titel -->
	<div>
		<h2>
			Übungsblatt <?php echo $model->uebungsblaetter->UebungsNr ?>
		</h2>
	</div>
	
	<!-- Abgabe gehört zu  -->
	<div>
		<h2>
			Abgabe von <?php echo $model->benutzerMarterikelNr->Vorname." ".$model->benutzerMarterikelNr->Nachname ?>
		<h2>
	</div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>	

    <?php $form = ActiveForm::begin(); ?>
    	
    	<?php foreach ($model->einzelaufgabes as $index=>$aufgabe):?>
    		<!-- Aufgabennummer -->
    		<div class="row">
    			<div class="col-md-1">		
    			</div>
    			<div class="col-md-1">		
    			</div>
    			<div>
    				<p>Aufabe <?php echo $aufgabe->AufgabeNr?></p>
    			</div>
    		</div>
    		
    		<!-- Die Antwortung -->
    		<div class="row">
    			<div class="col-md-1">		
    			</div>
    			<div class="col-md-1">		
    			</div>
    			<div class="col-md-8">
    				<pre> <?php echo  $aufgabe->Text?></pre>
    			</div>
    		</div>
    		
    		<!-- Punkte -->
    		<div class="row">
    			<div class="col-md-1">	
    			</div>
    			<div class="col-md-1">		
    			</div>
    			<div class="col-md-1">
    				<?= $form->field($aufgabe, "[$index]Punkte")->textInput()?>
    			</div>
    		</div>
    		
    		<!-- Bewertung -->
    		<div class="row">
    			<div class="col-md-1">		
    			</div>
    			<div class="col-md-1">		
    			</div>
    			<div class="col-md-4">
    				<?= $form->field($aufgabe, "[$index]Bewertung")->textarea(['rows' => 6])?>
    			</div>
    		</div>
    		
    		<!-- Leerzeichen -->
    		<div class="row">
    			</br>
    		</div>
    	
    	<?php endforeach;?>
    
    
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
       

    <?php ActiveForm::end(); ?>

</div>
