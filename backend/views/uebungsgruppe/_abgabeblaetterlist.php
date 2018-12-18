<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\bootstrap\Modal;
?>

<!-- $model ist Tabelle uebungsblaetter -->

<div class = "item" >
    <div align="center">
    <?php //echo "$model->UebungsID"?>
    	<?= Html::a('<img src = "../../Uebung/Abgabe.png" class="img-circle" alt="user image" height = "100" width="100" />', ['uebungsgruppe/index']) ?>
    </div>
    
    <div align = "center"><b>Übungsblatt <?= $model->UebungsNr?></b></div>
</div>
<div>&nbsp</div>