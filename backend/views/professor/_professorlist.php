<?php
use yii\helpers\Html;
?>

<div class="benutzer">
	<div class = "vorname">
		<img src="<?= $model->Profiefoto ?>" class="img-circle" alt="user image" height = "90" width="90"/>
		<p><?= Html::encode($model->Benutzername) ?></p>
	</div>

</div>