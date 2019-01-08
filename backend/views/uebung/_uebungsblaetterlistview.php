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
    	<?= Html::a('<img src = "../../Uebung/U.png" class="img-circle" alt="user image" height = "90" width="90" />', ['uebungsblaetter/index', 'id' => $model->UebungsID]) ?>
    </div>
    <div>&nbsp</div>
    <div align = "center"><b><?= $model->Bezeichnung?></b></div>
</div>
<div>&nbsp</div>
<div>&nbsp</div>
<div>&nbsp</div>

<?php Pjax::end()?>
