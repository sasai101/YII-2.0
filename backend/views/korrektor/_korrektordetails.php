<?php
use yii\helpers\Html;
use function GuzzleHttp\Psr7\uri_for;
use common\models\Abgabe;

?>
<div class="title">
		<div>
			<h3>Details von <?php echo $modelKorrektor->marterikelNr->Vorname." ".$modelKorrektor->marterikelNr->Nachname?></h3>
		</div>
</div>

<div class="row">
	<div class="col-md-3">
	
    <!-- Leere Zeile -->
	<div class="col-md-2"></br></div>
		<div >
    		<!-- Profiefoto von Benutzer -->
    		<?php $imge = $modelKorrektor->marterikelNr->Profiefoto?>
    		<?= Html::img($imge,['class'=>'img-circle','alt'=>'user image', 'height'=>'150', 'width'=>'150'])?>
		</div>
	</div>

	<!-- Übungsgruppen und Übungen -->	
	<div class="col-md-6">
	<div><h5>Korrierte Abgabe</h5></div>	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
		<div>
			<table class="table table-condensed" >
				<tr>
					<th>Anzahl der korrigierte Abgabe</th>
				</tr>
			
				<tr>
					<th><?php echo Abgabe::find()->where(['Korrektor_MarterikelNr'=>$modelKorrektor->MarterikelNr])->count()?></th>
				</tr>
				
			</table>
		</div>
	</div>
</div>