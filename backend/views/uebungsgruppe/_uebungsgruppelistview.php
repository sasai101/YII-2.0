<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\bootstrap\Modal;
?>

<div class = "item" >
    <div align="center">
    <?php //echo "$model->UebungsID"?>
    	<?= Html::a('<img src = "../../Uebung/U.png" class="img-circle" alt="user image" height = "200" width="200" />', ['uebungsblaetter/index', 'id' => $model->UebungsID]) ?>
    </div>
    <div>&nbsp</div>
    <div align = "center"><b><?= $model->Bezeichnung?></b></div>
</div>
<div>&nbsp</div>
<div>&nbsp</div>
<div>&nbsp</div>
