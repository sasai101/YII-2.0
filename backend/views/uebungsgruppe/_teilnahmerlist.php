<?php
use yii\helpers\Html;
?>
<div class="item">
    <div class="benutzer">
    	<div class = "vorname" align = "center">
    		<?php $img = $model->benuterMarterikelNr->Profiefoto ?>
    		<?= Html::a("<img src='$img' class='img-circle' alt='user image' height = '90' width='90'/>",['personecharts','marterikelNr'=>$model->Benuter_MarterikelNr, 'uebungsgruppeID'=>$modelUebungsgruppe->UebungsgruppeID]) ?>
    		<p align = "center" >&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::encode($model->benuterMarterikelNr->Vorname.' '.$model->benuterMarterikelNr->Nachname) ?></p>
    	</div>
    </div>
</div>