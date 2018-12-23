<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\Pjax;
?>

<div class = "item" >
    <div align="center">
    
    <?php Pjax::begin()?>
    <?php //echo "$model->UebungsID"?>
    	<?= Html::a('<img src = "../../Uebung/Modul.png" class="img-circle" alt="user image" height = "150" width="150" />', ['index', 'id'=>$model->ModulID]) ?>
    </div>
    <div>&nbsp</div>
    <div align = "center"><b><?= HtmlPurifier::process(mb_substr($model->Bezeichnung, 0, 25).'......')?></b></div>
    
</div>
<div>&nbsp</div>
<div>&nbsp</div>
<div>&nbsp</div>
<?php Pjax::end()?>