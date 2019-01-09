<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\Pjax;
?>

<div class = "item" >
    <div align="center">
    
    <?php //echo "$model->UebungsID"?>
    	<?= Html::a('<img src = "../../Uebung/Modul.png" class="img-circle" alt="user image" height = "90" width="90" />', ['index', 'id'=>$model->ModulID]) ?>
    </div>
    <div>&nbsp</div>
    <div align = "center"><b><?= HtmlPurifier::process(mb_substr($model->Bezeichnung, 0, 40).'......')?></b></div>
    
</div>
<div>&nbsp</div>
<div>&nbsp</div>
<div>&nbsp</div>