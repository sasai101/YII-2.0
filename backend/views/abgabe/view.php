<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Abgabe $model
 */

$this->title = 'Abgabe';
$this->params['breadcrumbs'][] = ['label' => 'Alle Übungen', 'url' => ['uebung/alleuebungsgruppe']];
$this->params['breadcrumbs'][] = ['label' => 'Alle Übungsgruppen', 'url' => ['uebungsgruppe/alleuebungsgruppe','id'=>$model->uebungsblaetter->uebungs->UebungsID]];
$this->params['breadcrumbs'][] = ['label' => 'Übungsgruppe'.$model->uebungsgruppen->GruppenNr, 'url'=>['uebungsgruppe/gruppendetails', 'id'=>$model->uebungsgruppen->UebungsgruppeID]];
$this->params['breadcrumbs'][] = ['label' => 'Alle Abgabe von Gruppe '.$model->uebungsgruppen->GruppenNr, 'url'=>['abgabe/index', 'UebungsgruppeID'=>$model->UebungsgruppenID, 'UebungsblaetterID'=>$model->UebungsblaetterID]];
$this->params['breadcrumbs'][] = $model->benutzerMarterikelNr->Vorname." ".$model->benutzerMarterikelNr->Nachname;
?>
	<div></br></div>
<div class="panel panel-default">
	<div></br></div>
    <div class="panel-body">
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
            	
            	<?php foreach ($model->einzelaufgabes as $index=>$aufgabe):?>
            	<div class="panel panel-primary">
                	<div class="panel-heading">
                		<p>
                			<b><h4>Aufabe <?php echo $aufgabe->AufgabeNr?></b>
                		</p>
                	</div>
                	<div class="panel-body">
            		<!-- Aufgabennummer -->
            		
            		
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
            				<pre> <?php echo  $aufgabe->Punkte?></pre>
            			</div>
            		</div>
            		
            		<!-- Bewertung -->
            		<div class="row">
            			<div class="col-md-1">		
            			</div>
            			<div class="col-md-1">		
            			</div>
            			<div class="col-md-4">
            				<pre> <?php echo  $aufgabe->Bewertung?></pre>
            			</div>
            		</div>
            		
            		<!-- Leerzeichen -->
            		<div class="row">
            			</br>
            		</div>
            		</div>
            	</div>
            	<?php endforeach;?>
        
        </div>
    </div>
    </div>
</div>