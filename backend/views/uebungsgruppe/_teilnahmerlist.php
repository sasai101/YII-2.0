<?php
use yii\helpers\Html;
?>
<div class="item">
    <div class="benutzer">
    	<div class = "vorname" align = "center">
    		<img src="<?= $model->benuterMarterikelNr->Profiefoto ?>" class="img-circle" alt="user image" height = "90" width="90"/>
    		<p align = "center" >&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::encode($model->benuterMarterikelNr->Vorname.' '.$model->benuterMarterikelNr->Nachname) ?></p>
    	</div>
    </div>
</div>