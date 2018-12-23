<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
?>

<!-- $model ist Tablle uebung -->

<div class = "item" >
    <div align="center">
    
    <?php Pjax::begin()?>
    <?php //echo "$model->UebungsID"?>
    	<?= Html::a('<img src = "../../Uebung/Uebungsgruppe.png" class="img-circle" alt="user image" height = "150" width="150" />', ['uebungsgruppe/alleuebungsgruppe', 'id' => $model->UebungsID]) ?>
    </div>
    <div>&nbsp</div>
    <div align = "center"><b><?= $model->Bezeichnung?></b></div>
</div>
<div>&nbsp</div>
<div>&nbsp</div>
<div>&nbsp</div>

<?php Pjax::end()?>
