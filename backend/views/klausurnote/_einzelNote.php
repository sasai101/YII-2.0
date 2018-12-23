<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
?>

<div class = "item" >
    <div align="center">
    <?php Pjax::begin()?>
    <?php //echo "$model->UebungsID"?>
    	<?= Html::a('<img src = "../../Uebung/Note.jpg" class="img-circle" alt="user image" height = "150" width="150" />', ['klausurnote/index','id'=>$model->KlausurID]) ?>
    </div>
    <div>&nbsp</div>
    <div align="center"><b><?= $model->Bezeichnung?></b></div>
    <div align="center"><b><?= HtmlPurifier::process(mb_substr($model->modul->Bezeichnung, 0, 30).'......')?></b></div>
</div>
<div>&nbsp</div>
<div>&nbsp</div>
<div>&nbsp</div>
<?php Pjax::end()?>
