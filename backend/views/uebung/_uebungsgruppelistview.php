<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
use common\models\Uebungsblaetter;
use common\models\Uebung;
?>

<!-- $model ist Tablle uebung -->


<div class = "item" >
    <div align="center">
    
    <?php //echo "$model->UebungsID"?>
    	<?= Html::a('<img src = "../../Uebung/Uebungsgruppe.png" class="img-circle" alt="user image" height = "90" width="90" />', ['uebungsgruppe/alleuebungsgruppe', 'id' => $model->UebungsID]) ?>
    	<span class="badge badge-pill badge-info"><?php echo Uebung::UnkorrieteAbgaebInUebung($model->UebungsID)?></span>
    </div>
    <div>&nbsp</div>
    <div align = "center"><b><?= $model->Bezeichnung?></b></div>
</div>
<div>&nbsp</div>
<div>&nbsp</div>
<div>&nbsp</div>


