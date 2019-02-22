<?php
use common\models\Klausur;
use common\models\Benutzer;

?>

<div class = "row">

	<div class="col-md-12">
	<div><h3>Vorhersagete Klausurpunkt von allen zugelassenen Studierenden</h3></div>	
		<div>
			<table class="table table-condensed">
				<tr>
					<th>#</th>
					<th>MarterikelNr</th>
					<th>Name</th>
					<th>Vorhersagte Punkt</th>
				</tr>
				<?php $i=1?>
				<?php foreach (Klausur::UebungsPunkteInArrayMitMarterikelNR($KlausurID) as $key => $punkt):?>
				<?php $model = Benutzer::findOne($key)?>
				<tr>
					<th><?php echo $i?></th>
					<td><?php echo $key?></td>
					<td><?php echo $model->Vorname." ".$model->Nachname?></td>
					<td><?php if($punkt == -1){
					   echo "Die Daten sind nicht genug!!";
					}else{
					   echo $punkt;
					}?></td>
				</tr>
				<?php $i++?>
				<?php endforeach;?>
			</table>
		</div>
	</div>

</div>