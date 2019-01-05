<?php

use yii\widgets\Pjax;
use common\models\ModulAnmeldenBenutzer;
use yii\helpers\HtmlPurifier;
use common\models\Uebungsgruppe;
?>
<?php Pjax::begin()?>
<div class="uebungsnote">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    	<h4>Übungsblatt: <?php echo $model->modul->Bezeichnung?></h4>
                    	
                    </h3>
                </div>
                <div class="panel-body">
                	<div class="row">
                      	<div class="col-md-12">
                      		<h5>Gesamte Besucher: <b><?php echo ModulAnmeldenBenutzer::find()->where(['ModulID'=>$model->ModulID])->count()?></b></h5>
                      		<?php foreach ($model->modul->uebungs as $uebung):?>
                      			<h5>Übung: <b><?php echo HtmlPurifier::process(mb_substr($uebung->Bezeichnung, 0, 25).'......')?></b></h5>
                      			<h5>Gesamte Übungsgruppen: <b><?php echo Uebungsgruppe::find()->where(['UebungsID'=>$uebung->UebungsID])->count()?></b></h5>
                      		<?php endforeach;?>
                      		
                      	</div>
              		</div>

                </div>
            </div>
			
		</div>
	</div>
</div>
<?php Pjax::end()?>