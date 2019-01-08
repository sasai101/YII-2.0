<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Abgabe $model
 */

$this->title = $model->AbgabeID;
$this->params['breadcrumbs'][] = ['label' => 'Abgabes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
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