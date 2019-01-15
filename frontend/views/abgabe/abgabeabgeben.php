<?php 

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

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
        	
        	<?= $form->field($model, 'file')->fileInput() ?>
        	
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
            			<div class="col-md-12">
            				<?= $form->field($aufgabe, "[$index]Text")->textarea(['rows' => 12])?>
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
                    <?= Html::submitButton('Abgaben', ['class' => 'btn btn-success']) ?>
                </div>
               
        
            <?php ActiveForm::end(); ?>
        		
        </div>
    </div>
</div>