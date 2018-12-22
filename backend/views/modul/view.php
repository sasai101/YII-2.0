<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Modul $model
 */

?>

<div class = "modul-listview">

	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Titel -->	
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Profeesor -->
    <div>
    	<p align="center"><h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspProfessor</h3></p>
		</br>		
		<div class="row">
			<div class="col-md-1"></div>
			<div>

        		<?php foreach ($model->modulLeitetProfessors as $professor):?>
        			<div class="col-md-2">
        			<?php $imge=$professor->professorMarterikelNr->marterikelNr->Profiefoto?>
        			<div>
        				<?= Html::img($imge,['class'=>'img-circle','alt'=>'user image', 'height'=>'90', 'width'=>'90'])?>
        				<p>Prof. Dr. <?php echo $professor->professorMarterikelNr->marterikelNr->Vorname." ".$professor->professorMarterikelNr->marterikelNr->Nachname ?></p>
        			</div>
        			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        			</div>
        		<?php endforeach; ?>
    		</div>
		</div>
		
    </div>
    
    
    <!-- Mitarbeiter -->
    <div>
    	<p align="center"><h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMitarbeiter</h3></p>
		</br>		
		<div class="row">
			<div class="col-md-1"></div>
			<div>

        		<?php foreach ($model->uebungs as $uebung):?>
        			<div class="col-md-2">
        			<?php $imge=$uebung->mitarbeiterMarterikelNr->marterikelNr->Profiefoto?>
        			<div>
        				<?= Html::img($imge,['class'=>'img-circle','alt'=>'user image', 'height'=>'90', 'width'=>'90'])?>
        				<p><?php echo $uebung->mitarbeiterMarterikelNr->marterikelNr->Vorname." ".$uebung->mitarbeiterMarterikelNr->marterikelNr->Nachname ?></p>
        				<p><b><?php echo $uebung->Bezeichnung?></b></p>
        			</div>
        			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        			</div>
        		<?php endforeach; ?>
    		</div>
		</div>
		
    </div>
    
    
    <!-- Totur -->
    <div>
    	<p align="center"><h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTotur</h3></p>
		</br>		
		<?php foreach ($model->uebungs as $uebung):?>
    		<div class="row">
    			<div><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $uebung->Bezeichnung?></b></div>
    			<div></br></div>
    			<div class="col-md-1"></div>
    			<div>

            		<div>
            			<?php foreach ($uebung->uebungsgruppes as $gruppe){?>
                			<div class="col-md-2">
                			<?php $imge=$gruppe->tutorMarterikelNr->marterikelNr->Profiefoto?>
                			<div>
                				<?= Html::img($imge,['class'=>'img-circle','alt'=>'user image', 'height'=>'90', 'width'=>'90'])?>
                				<p><?php echo $gruppe->tutorMarterikelNr->marterikelNr->Vorname." ".$gruppe->tutorMarterikelNr->marterikelNr->Nachname ?></p>
                				<p><b>Übungsgruppe <?php echo $gruppe->GruppenNr?><b></b></p>
                			</div>
                			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                			</div>
                		<?php }?>
            		</div>       		
            		
        		</div>
    		</div>
		<?php endforeach;?>
    </div>
    
</div>
