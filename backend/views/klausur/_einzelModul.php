<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\bootstrap\Modal;
?>

<div class = "item" >
    <div align="center">
    <?php //echo "$model->UebungsID"?>
    	<?= Html::a('<img src = "../../Uebung/Modul.png" class="img-circle" alt="user image" height = "150" width="150" />', ['index', 'id'=>$model->ModulID]) ?>
    </div>
    <div>&nbsp</div>
    <div align = "center"><b><?= $model->Bezeichnung?></b></div>
</div>
<div>&nbsp</div>
<div>&nbsp</div>
<div>&nbsp</div>
