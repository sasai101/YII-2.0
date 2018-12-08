<?php 
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="panel panel-info">	
	<div class="panel-heading">
  		<h4 style="font-weight:bold"><?php echo HtmlPurifier::process(mb_substr($model->Bezeichnung, 0, 15).'......');?></h4>
	</div>
	<div class="panel-body">
        <p style="font-size:13px">
            <span style="color:orangered"><?= $model->Bezeichnung ?></span><br>
        </p>
        
        <div style="margin:15px 0">
        
        	<?php //echo HtmlPurifier::process(mb_substr($model->Bezeichnung, 0, 25).'......'); ?>
        </div>
        
        <p class="info">
                        添加：<?= $model->Bezeichnung ?><br>
                        最后修改：<?= $model->Bezeichnung ?>
        </p>
        
        <div style="text-align:right">
            <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->ModulID], ['title' => '查看']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['upcreate', 'id' => $model->ModulID], ['title' => '修改']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->ModulID], ['title' => '删除']) ?>
        </div>
    </div>
</div>
