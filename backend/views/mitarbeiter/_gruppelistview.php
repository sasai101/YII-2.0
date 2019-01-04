<?php
use yii\helpers\Html;
use yii\helpers\Json;
use common\models\Uebung;
use yii\widgets\Pjax;
?>

<?php Pjax::begin()?>
<div class="uebungsnote">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    	<h4>Übungsgruppe<?php echo $model->GruppenNr?>
						&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo Html::a('<i class="fa fa-bar-chart"></i>',['uebungsgruppe/uebungsgruppebarecharts','uebungsgruppeID'=>$model->UebungsgruppeID])?></h4>
                    	
                    </h3>
                </div>
                <div class="panel-body">
					<table class="table table-condensed" >
        				<tr>
        					<th>Max. Person</th>
        					<th>Anzahl der Person</th>
        					<th>Anzahl der Zugelassener</th>
        				</tr>
        				
        				<tr>
        					<td><?php echo $model->Max_Person?></td>
        					<td><?php echo $model->Anzahl_der_Personen?></td>
        					<th><?php echo Uebung::AnzahlderzugelassenPersonderGruppe($model->UebungsgruppeID)?>
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
<?php Pjax::end()?>