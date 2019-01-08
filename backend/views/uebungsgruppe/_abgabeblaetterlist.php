<?php
use common\models\Uebungsgruppe;
use yii\helpers\Html;
use yii\widgets\Pjax;
?>

<!-- $model ist Tabelle uebungsblaetter -->
<?php Pjax::begin()?>
<div class = "item" >
    <div align="center">
    <?php //echo "$model->UebungsID"?>
    	<?= Html::a('<img src = "../../Uebung/Abgabe.png" class="img-circle" alt="user image" height = "90" width="90" />', ['abgabe/index', 'UebungsgruppeID'=>$modelUebungsgruppe->UebungsgruppeID, 'UebungsblaetterID'=>$model->UebungsblatterID]) ?></br>
    	<span class="badge badge-pill badge-info"><?php echo Uebungsgruppe::AnzahlUnkorreigiteUebungsblatt($modelUebungsgruppe->UebungsgruppeID, $model->UebungsblatterID)?></span>
    </div>
    
    <div align = "center"><b>Übungsblatt <?= $model->UebungsNr?></b></div>
</div>
<div>&nbsp</div>
<?php Pjax::end()?>