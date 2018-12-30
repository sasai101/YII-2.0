<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use function GuzzleHttp\Psr7\uri_for;
use common\models\BenutzerTeilnimmtUebungsgruppe;
use common\models\Klausur;
use common\models\ModulAnmeldenBenutzer;
use common\models\Uebung;
use common\models\Uebungsgruppe;
use common\models\BenutzerAnmeldenKlausur;
use common\models\Klausurnote;

?>
<div class="title">
		<div>
			<h3>Details von <?php echo $modelMitarbeiter->marterikelNr->Vorname." ".$modelMitarbeiter->marterikelNr->Nachname?></h3>
		</div>
</div>

<div class="row">
	<div class="col-md-3">
	
    <!-- Leere Zeile -->
	<div class="col-md-2"></br></div>
		<div >
    		<!-- Profiefoto von Benutzer -->
    		<?php $imge = $modelMitarbeiter->marterikelNr->Profiefoto?>
    		<?= Html::img($imge,['class'=>'img-circle','alt'=>'user image', 'height'=>'150', 'width'=>'150'])?>
		</div>
	</div>

	<!-- Übungsgruppen und Übungen -->	
	<div class="col-md-4">
	<div><h5>Leitende Übungen</h5></div>	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
		<div>
			<table class="table table-condensed" >
				<tr>
					<th>#</th>
					<th>Übung</th>
					<th>Übungsgruppenanzahl</th>
					<th>Modul</th>
				</tr>
				<?php $i=1?>
				<?php foreach (Uebung::find()->where(['Mitarbeiter_MarterikelNr'=>$modelMitarbeiter->MarterikelNr])->all() as $uebung):?>
				<tr>
					<th><?php echo $i?></th>
					<td><?php echo HtmlPurifier::process(mb_substr($uebung->Bezeichnung, 0, 20).'......')?></td>
					<td><?php echo Uebungsgruppe::find()->where(['UebungsID'=>$uebung->UebungsID])->count()?> Übungsgruppen</th>
					<td><?php echo HTMLPurifier::process(mb_substr($uebung->modul->Bezeichnung,0, 25).'......')?></td>
					<?php $i++?>
				</tr>
				<?php endforeach;?>
			</table>
		</div>
	</div>
	
	<!-- Erstellte Klausur -->	
	<div class="col-md-4">
	<div><h5>Erstellte Klausur</h5></div>	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<div>
		<table class="table table-condensed">
			<tr>
				<th>#</th>
				<th>Klausur</th>
				<th>Modul</th>
				<th>Anzahl der Person</th>
			</tr>
			<?php $i=1?>
			<?php foreach (Klausur::find()->where(['Mitarbeiter_MarterikelNr'=>$modelMitarbeiter->MarterikelNr])->all() as $Klausur):?>
			<tr>
				<th><?php echo $i?></th>
				<td><?php echo $Klausur->Bezeichnung?></td>
				<td><?php echo HTMLPurifier::process(mb_substr($Klausur->modul->Bezeichnung,0,25).'......')?></td>
				<td><?php echo BenutzerAnmeldenKlausur::find()->where(['KlausurID'=>$Klausur->KlausurID])->count()?></td>
			</tr>
			<?php $i++?>
			<?php endforeach;?>
		</table>
	</div>
	
	<!-- Klausur note -->	
	<div><h5>Klausur note</h5></div>	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<div>
		<table class="table table-condensed">
			<tr>
				<th>#</th>
				<th>Klausur</th>
				<th>Modul</th>
				<th>Anzahl der Person</th>
			</tr>
			<?php $i=1?>
			<?php foreach (Klausur::find()->where(['Mitarbeiter_MarterikelNr'=>$modelMitarbeiter->MarterikelNr])->all() as $Klausurnote):?>
			<tr>
				<th><?php echo $i?></th>
				<td><?php echo $Klausurnote->Bezeichnung?></td>
				<td><?php echo HTMLPurifier::process(mb_substr($Klausur->modul->Bezeichnung,0,25).'......')?></td>
				<td><?php echo Klausurnote::find()->where(['KlausurID'=>$Klausur->KlausurID])->count()?></td>
			</tr>
			<?php $i++?>
			<?php endforeach;?>
		</table>
	</div>
	
	</div>
	
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>	
</div>