<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Abgabe */

?>
<div class="row"></br></div>
<div class="panel panel-default">
    <div class="panel-body">
    	<div class="abgabe-update">
        	<div class="abgabe-index">
            <!-- Leere Zeile -->
        	<div class="row"></br></div>
        	
        	<?php $form = ActiveForm::begin([
        	]); ?>
        	
        	<div>
        		<h3>
        			Modul: <?php echo $model->uebungsblaetter->uebungs->modul->Bezeichnung ?>
        		</h3>
        	</div>
        	
        	<div>
        		<h3>
        			Übungsgruppe: <?php echo $model->uebungsgruppen->GruppenNr ?>
        		</h3>
        	</div>
        	<!-- Titel -->
        	<div>
        		<h3>
        			Übungsblatt <?php echo $model->uebungsblaetter->UebungsNr ?>
        		</h3>
        	</div>
        	
        	
        	<!-- Leere Zeile -->
        	<div class="row"></br></div>
        	<?php if($model->Datein != null):?>
        	<div>
        		<h4>
        			Hochgeladene Abgabe: <b><?php echo  Html::a("Antwort vom Übungsblatt ".$model->uebungsblaetter->UebungsNr,['download', 'id'=>$model->AbgabeID]);?></b>
        		</h4>
        	</div>
        	<?php endif;?>
        	<!-- Leere Zeile -->
        	<div class="row"></br></div>	
            	
            	<?php foreach ($model->einzelaufgabes as $index=>$aufgabe):?>
            	<div class="panel panel-default">
                	<div class="panel-heading">
                		<p>
                			<h5>Aufabe <?php echo $aufgabe->AufgabeNr?></h5>
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
            			<p>Antwort</p>
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
            			<p>Punkt</p>
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
            			<p>Kommentar</p>
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
        		
        		<div class="form-group">
                    <?= Html::submitButton('Abrechen', ['class' => 'btn btn-success']) ?>
                </div>
               
        
            <?php ActiveForm::end(); ?>
        		
        </div>
    </div>
</div>