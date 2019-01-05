<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use function GuzzleHttp\Psr7\uri_for;
use common\models\Uebungsgruppe;

?>
<div class="title">
		<div>
			<h3>Details von <?php echo $modelTutor->marterikelNr->Vorname." ".$modelTutor->marterikelNr->Nachname?></h3>
		</div>
</div>

<div class="row">
	<div class="col-md-3">
	
    <!-- Leere Zeile -->
	<div class="col-md-2"></br></div>
		<div >
    		<!-- Profiefoto von Benutzer -->
    		<?php $imge = $modelTutor->marterikelNr->Profiefoto?>
    		<?= Html::img($imge,['class'=>'img-circle','alt'=>'user image', 'height'=>'150', 'width'=>'150'])?>
		</div>
	</div>

	<!-- Übungsgruppen und Übungen -->	
	<div class="col-md-6">
	<div><h5>Leitende Übungen</h5></div>	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
		<div>
			<table class="table table-condensed" >
				<tr>
					<th>#</th>
					<th>Übung</th>
					<th>Modul</th>
					<th>Übungsgruppe</th>
					<th>Übungsleiter</th>
				</tr>
				<?php $i=1?>
				<?php foreach (Uebungsgruppe::find()->where(['Tutor_MarterikelNr'=>$modelTutor->MarterikelNr])->all() as $uebungsgruppe):?>
				<tr>
					<th><?php echo $i?></th>
					<td><?php echo HtmlPurifier::process(mb_substr($uebungsgruppe->uebungs->Bezeichnung, 0, 25).'......')?></td>
					<td><?php echo HtmlPurifier::process(mb_substr($uebungsgruppe->uebungs->modul->Bezeichnung, 0, 30).'......')?></td>
					<td><?php echo $uebungsgruppe->GruppenNr?></td>
					<td><?php echo $uebungsgruppe->uebungs->mitarbeiterMarterikelNr->marterikelNr->Vorname." ".$uebungsgruppe->uebungs->mitarbeiterMarterikelNr->marterikelNr->Vorname?></td>
					<?php $i++?>
				</tr>
				<?php endforeach;?>
			</table>
		</div>
	</div>
</div>