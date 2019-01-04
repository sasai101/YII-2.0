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
                    	<?php echo $model->Bezeichnung?>:</br> 
                    	<?php echo $model->modul->Bezeichnung?>
                    </h3>
                    <h3>
                    	<?php echo Html::a('<i class="fa fa-bar-chart"></i>',['klausur/echartsbarklausur','id'=>$model->KlausurID])?>
                    </h3>
                </div>
                <div class="panel-body">
					<table class="table table-condensed" >
        				<tr>
        					<th>Gesamte Leute</th>
        					<th>Bestanden</th>
        					<td>Nicht Bestand</td>
        				</tr>
        				
        				<tr>
        					<td><?php echo Klausurnote::gesatmtePerson($model->KlausurID)?></td>
        					<td><?php echo Klausurnote::AnzahlderBestander($model->KlausurID)?></td>
        					<td><?php echo Klausurnote::AnzahlderNichtBestander($model->KlausurID)?></td>
        					
        				</tr>
        				
        			</table>
        			
        			<!-- Gesamte Punkte -->
        			<div>
        				&nbsp Durchschnitt :<b><?php echo number_format(Klausurnote::Klausurdurchschnitt($model->KlausurID),2)?></b>
        			</div>
        			
        			
                </div>
            </div>
			
		</div>
	</div>
</div>
<?php Pjax::end()?>