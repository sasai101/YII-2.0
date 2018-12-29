<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use function GuzzleHttp\Psr7\uri_for;
use common\models\Uebungsgruppe;
use common\models\BenutzerTeilnimmtUebungsgruppe;
use common\models\ModulAnmeldenBenutzer;

?>
<div class="title">
		<div>
			<h3>Details von <?php echo $modelBenutzer->Vorname." ".$modelBenutzer->Nachname?></h3>
		</div>
</div>

<div class="row">
	<div class="col-md-3">
	
    <!-- Leere Zeile -->
	<div class="col-md-2"></br></div>
		<div >
    		<!-- Profiefoto von Benutzer -->
    		<?php $imge = $modelBenutzer->Profiefoto?>
    		<?= Html::img($imge,['class'=>'img-circle','alt'=>'user image', 'height'=>'150', 'width'=>'150'])?>
		</div>
	</div>

	<!-- Übungsgruppen und Übungen -->	
	<div class="col-md-4">
	<div><h5>Übungen und Übungsgruppe</h5></div>	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
		<div>
			<table class="table table-condensed" >
				<tr>
					<th>#</th>
					<th>Übung</th>
					<th>Übungsleiter</th>
					<th>Übungsgruppe</th>
					<th>Tutor</th>
				</tr>
				<?php $i=1?>
				<?php foreach (BenutzerTeilnimmtUebungsgruppe::find()->where(['Benuter_MarterikelNr'=>$modelBenutzer->MarterikelNr])->all() as $uebung):?>
				<tr>
					<th><?php echo $i?></th>
					<td><?php echo HtmlPurifier::process(mb_substr($uebung->uebungsgruppe->uebungs->Bezeichnung, 0, 20).'......')?></td>
					<td><?php echo $uebung->uebungsgruppe->uebungs->mitarbeiterMarterikelNr->marterikelNr->Vorname." ".$uebung->uebungsgruppe->uebungs->mitarbeiterMarterikelNr->marterikelNr->Nachname?></td>
					<td><?php echo $uebung->uebungsgruppe->GruppenNr?></th>
					<td><?php echo $uebung->uebungsgruppe->tutorMarterikelNr->marterikelNr->Vorname." ".$uebung->uebungsgruppe->tutorMarterikelNr->marterikelNr->Vorname?></td>
					<?php $i++?>
				</tr>
				<?php endforeach;?>
			</table>
		</div>
	</div>
	<!-- Übungsgruppen und Übungen -->	
	<div class="col-md-4">
	<div><h5>Besuchte Modul</h5></div>	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
		<div>
			<table class="table table-condensed">
				<tr>
					<th>#</th>
					<th>Modul</th>
					<th colspan="2" >Professor</th>
				</tr>
				<?php $i=1?>
				<?php foreach (ModulAnmeldenBenutzer::find()->where(['Benutzer_MarterikelNr'=>$modelBenutzer->MarterikelNr])->all() as $modul):?>
				<tr>
					<th><?php echo $i?></th>
					<td><?php echo $modul->modul->Bezeichnung?></td>
					
						<?php foreach ($modul->modul->modulLeitetProfessors as $professor):?>
							<td>Prof. Dr. <?php echo $professor->professorMarterikelNr->marterikelNr->Vorname." ".$professor->professorMarterikelNr->marterikelNr->Vorname?></td>
						<?php endforeach;?>
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