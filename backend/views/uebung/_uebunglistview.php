<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\bootstrap\Modal;
?>

<div class = "item" >
    <div align="center">
    	<p><?= print_r($model->uebungs)?>
    	<?= Html::a('<img src = "../../Uebung/U.png" class="img-circle" alt="user image" height = "200" width="200" />', ['einzelubung', 'id' => $model->ModulID]) ?>
    </div>
    <div><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?= $model->Bezeichnung?></b></div>
</div>
<div>&nbsp</div>