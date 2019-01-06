<?php 
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
?>

<div class = "item" style="height: 400px">
    <div class="panel panel-info" >	
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
            <!-- Namen vom Professor -->
            <p>
            	<b>Leitet von :<br></b>
            	<?php foreach ($model->professorMarterikelNrs as $name){
            	    // url to professor/view
            	    echo Html::a("Prof. Dr. ".$model->getBenutzerNname($name->MarterikelNr), ['professor/view', 'id' => $name->MarterikelNr], ['class' => 'profile-link']);
            	    echo "<br>";
            	}?>
            </p>
            
            <!-- Namen vom Mitarbeit -->
            <p>
            	<b>Wissenschaftliche Mitarbeiter :<br></b>
            	<?php foreach ($model->uebungs as $name){
            	    /*echo "<pre>";
            	    print_r($name);
            	    echo "</pre>";
            	    exit(0);*/
            	    echo Html::a($model->getBenutzerNname($name->Mitarbeiter_MarterikelNr), ['mitarbeiter/view', 'id' => $name->Mitarbeiter_MarterikelNr], ['class' => 'profile-link']);
            	    
            	    echo "<br>";
            	}?>
            </p>
            <!-- Alle Übungen -->
            <p>        
            	<?php foreach ($model->uebungs as $name){
            	    echo "<b>Übung :</b>";
            	    echo Html::a($name->Bezeichnung, ['uebungsgruppe/alleuebungsgruppe', 'id' => $name->UebungsID], ['class' => 'profile-link']);
            	    
            	    echo "<br>";
            	}?>
            </p>
            
            
            <div style="text-align:right">
            
                <!-- Modal Button Modal js unter Verzeichnung @app\backend\web\js\viewModal.js -->
                <a class="modalButton" href="<?=Url::to(['view', 'id'=>$model->ModulID]); ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                
                <a href="<?=Url::to(['update', 'id'=>$model->ModulID]); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->ModulID], [
                        'data' => [
                            'confirm' => 'Sind sicher, um die Model zu löschen?',
                            'method' => 'post',
                        ],
                ]) ?>
            </div>
        </div>
    </div>
</div>

