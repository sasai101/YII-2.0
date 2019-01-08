<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use common\models\Uebungsgruppe;
?>

<!-- $model ist tabelle uebungsgruppe -->

<div class = "item" >
    <div align="center">
    
    	<?php $imag = $model->getProffotoURL($model->Tutor_MarterikelNr)?>
    	<?= Html::a("<img src = '$imag' class='img-circle' alt='user image' height = '100' width='100' />", ['uebungsgruppe/gruppendetails', 'id' => $model->UebungsgruppeID]) ?>
    	<span class="badge badge-pill badge-info"><?php echo Uebungsgruppe::AnzahlUnkorreigiteGruppe($model->UebungsgruppeID)?></span>
    </div>
    <div align = "center">Totur: <?= $model->getTutorname($model->Tutor_MarterikelNr)?></div>
    <div align = "center">Übungsguppe <?= $model->GruppenNr ?></div>
    <div>&nbsp</div>
    
</div>
<div>&nbsp</div>
<div>&nbsp</div>
<div>&nbsp</div>
