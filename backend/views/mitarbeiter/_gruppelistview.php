<?php
use yii\helpers\Json;
?>


<div class="uebungsnote">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    	Übungsgruppe<?php echo $model->GruppenNr?>
                    </h3>
                </div>
                <div class="panel-body">
					<table class="table table-condensed" >
        				<tr>
        					<th>Max. Person</th>
        					<th>Anzahl der Person</th>
        				</tr>
        				
        				<tr>
        					<td><?php echo $model->Max_Person?></td>
        					<td><?php echo $model->Anzahl_der_Personen?></td>
        				</tr>
        			</table>
        			
        			<!-- Korrektor -->
        			<div>
        				&nbsp Tutor: <b><?php echo $model->tutorMarterikelNr->marterikelNr->Vorname." ".$model->tutorMarterikelNr->marterikelNr->Nachname?></b>
        			</div>
                </div>
            </div>
			
		</div>
	</div>
</div>