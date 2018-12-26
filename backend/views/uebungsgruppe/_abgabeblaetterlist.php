<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
?>

<!-- $model ist Tabelle uebungsblaetter -->
<?php Pjax::begin()?>
<div class = "item" >
    <div align="center">
    <?php //echo "$model->UebungsID"?>
    	<?= Html::a('<img src = "../../Uebung/Abgabe.png" class="img-circle" alt="user image" height = "100" width="100" />', ['abgabe/index', 'UebungsgruppeID'=>$modelUebungsgruppe->UebungsgruppeID, 'UebungsblaetterID'=>$model->UebungsblatterID]) ?>
    </div>
    
    <div align = "center"><b>Übungsblatt <?= $model->UebungsNr?></b></div>
</div>
<div>&nbsp</div>
<?php Pjax::end()?>