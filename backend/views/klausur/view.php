<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/**
 * @var yii\web\View $this
 * @var common\models\Klausur $model
 */

$this->title = 'Klausureinsicht';
$this->params['breadcrumbs'][] = ['label' => 'Alle Modul', 'url' => ['klausurlistview', 'id'=>$model->ModulID]];
$this->params['breadcrumbs'][] = ['label' => HtmlPurifier::process(mb_substr($model->modul->Bezeichnung, 0, 15).'......'), 'url' => ['index', 'id'=>$model->ModulID]];
$this->params['breadcrumbs'][] = 'Klausureinsicht';
?>

<div class="klausur-view">

	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Titel -->
	<div>
		<h3>
			<?= Html::encode($model->modul->Bezeichnung); ?>
		</h3>
	</div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>	
	
	
	<div>
		<div class="col-md-4">
        	<!-- Professor -->
        	<div>
        		<p align="center"><h4>Professor</h4></p>
        		</br>
        		<div class="row">
            		<?php foreach ($model->modul->modulLeitetProfessors as $professor):?>
            			<div class="col-md-3">
            			<?php $imge=$professor->professorMarterikelNr->marterikelNr->Profiefoto?>
            			<div>
            				<?= Html::img($imge,['class'=>'img-circle','alt'=>'user image', 'height'=>'100', 'width'=>'100'])?>
            				<p>Prof. Dr. <?php echo $professor->professorMarterikelNr->marterikelNr->Vorname." ".$professor->professorMarterikelNr->marterikelNr->Nachname ?></p>
            			</div>
            			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            			</div>
            		<?php endforeach; ?>
        		</div>
        	</div>
        	
        	<!-- Leere Zeile -->
        	<div class="row"></br></div>
        	<!-- Leere Zeile -->
        	<div class="row"></br></div>	
        	
        	<!-- Mitarbeiter -->
        	<div>
        		<p align="center"><h4>Mitarbeiter</h4></p>
        		</br>
        		<?php $imge=$model->mitarbeiterMarterikelNr->marterikelNr->Profiefoto?>
        		
        		<?= Html::img($imge,['class'=>'img-circle','alt'=>'user image', 'height'=>'100', 'width'=>'100'])?>
        		<p>&nbsp&nbsp&nbsp&nbsp<?php echo $model->mitarbeiterMarterikelNr->marterikelNr->Vorname." ".$model->mitarbeiterMarterikelNr->marterikelNr->Nachname ?></p>
        	</div>
    	
    	</div>
    	
    	<!-- Echart -->
    	<div class="col-md-6">
    		<p>Echari</p>
    	</div>
	
	</div>

</div>


