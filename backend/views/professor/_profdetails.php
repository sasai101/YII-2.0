<?php
use yii\helpers\Html;
use function GuzzleHttp\Psr7\uri_for;
use common\models\ModulLeitetProfessor;

?>
<div class="title">
		<div>
			<h3>Details von <?php echo $modelProfessor->marterikelNr->Vorname." ".$modelProfessor->marterikelNr->Nachname?></h3>
		</div>
</div>

<div class="row">
	<div class="col-md-3">
	
    <!-- Leere Zeile -->
	<div class="col-md-2"></br></div>
		<div >
    		<!-- Profiefoto von Benutzer -->
    		<?php $imge = $modelProfessor->marterikelNr->Profiefoto?>
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
					<th>Modul</th>
				</tr>
				<?php $i=1?>
				<?php foreach (ModulLeitetProfessor::find()->where(['Professor_MarterikelNr'=>$modelProfessor->MarterikelNr])->all() as $modul):?>
				<tr>
					<th><?php echo $i?></th>
					<td><?php echo $modul->modul->Bezeichnung?></td>
					<?php $i++?>
				</tr>
				<?php endforeach;?>
			</table>
		</div>
	</div>
</div>