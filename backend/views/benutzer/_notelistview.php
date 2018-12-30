<?php
use yii\helpers\Json;
?>


<div class="uebungsnote">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    	Übungsblatt<?php echo $model->uebungsblaetter->UebungsNr?>
                    </h3>
                </div>
                <div class="panel-body">
					<table class="table table-condensed" >
        				<tr>
        					<th>Aufgabe</th>
        					<th>Punkte</th>
        				</tr>
        				<?php $i=1?>
        				<?php foreach ($model->einzelaufgabes as $einzeln):?>
        				<tr>
        					<td>Aufagebe <?php echo $einzeln->AufgabeNr?></td>
        					<td><?php echo $einzeln->Punkte?></td>
        					<?php $i++?>
        				</tr>
        				<?php endforeach;?>
        			</table>
        			<!-- Gesamte Punkte -->
        			<div>
        				&nbsp Gesamte Punkte: <b><?php echo $model->GesamtePunkt?></b>
        			</div>
        			
        			<!-- Korrektor -->
        			<div>
        				&nbsp Korrektor: <b><?php if($model->korrektorMarterikelNr==NUll){
                            				    echo "";
                            				}else{
                            				    echo $model->korrektorMarterikelNr->vorname." ".$model->korrektorMarterikelNr->nachname;
                            				}?></b>
        			</div>
                </div>
            </div>
			
		</div>
	</div>
</div>