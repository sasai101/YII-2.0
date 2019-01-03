<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
use common\models\Klausurnote;

?>

<?php Pjax::begin()?>
<div class="uebungsnote">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    	<?php echo $model->klausur->modul->Bezeichnung?>
                    </h3>
                    <h3>
                    	<?php echo Html::a('<i class="fa fa-pie-chart"></i>',['klausurnote/echartspieklausurnote', 'klausurnoteID'=>$model->KlausurnoteID,'marterikelNr'=>$model->Benutzer_MarterikelNr])?>
                    </h3>
                </div>
                <div class="panel-body">
					<table class="table table-condensed" >
        				<tr>
        					<th>Note</th>
        					<th>Punkte</th>
        				</tr>
        				
        				<tr>
        					<td><?php echo $model->Note?></td>
        					<td><?php echo $model->Punkt?></td>
        					
        				</tr>
        				
        			</table>
        			<!-- Gesamte Punkte -->
        			<div>
        				&nbsp Status :<b><?php if($model->Punkt >= $model->klausur->punkt4_0){
        				    echo "Bestanden";
        				}else{
        				    echo "Nicht Bestanden";
        				    }?></b>
        			</div>
        			
        			<!-- Korrektor -->
        			<div>
        				&nbsp Korrektor: <b><?php if($model->mitarbeiterMarterikelNr==NUll){
                            				    echo "";
                            				}else{
                            				    echo $model->mitarbeiterMarterikelNr->marterikelNr->Vorname." ".$model->mitarbeiterMarterikelNr->marterikelNr->Nachname;
                            				}?></b>
        			</div>
        			<div>
        				&nbsp Gesamte Teilname: <b><?php echo Klausurnote::gesatmtePerson($model->klausur->KlausurID)?></b>
        			</div>
        			<div>
        				&nbsp Durchschnitt: <b><?php echo number_format(Klausurnote::Klausurdurchschnitt($model->klausur->KlausurID),2)?></b>
        			</div>
                </div>
            </div>
			
		</div>
	</div>
</div>
<?php Pjax::end()?>