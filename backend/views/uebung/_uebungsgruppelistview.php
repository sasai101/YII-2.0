<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
?>

<!-- $model ist Tablle uebung -->


<div class = "item" >
    <div align="center">
    
    <?php //echo "$model->UebungsID"?>
    	<?= Html::a('<img src = "../../Uebung/Uebungsgruppe.png" class="img-circle" alt="user image" height = "90" width="90" />', ['uebungsgruppe/alleuebungsgruppe', 'id' => $model->UebungsID]) ?>
    </div>
    <div>&nbsp</div>
    <div align = "center"><b><?= $model->Bezeichnung?></b></div>
</div>
<div>&nbsp</div>
<div>&nbsp</div>
<div>&nbsp</div>


