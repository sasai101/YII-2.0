<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Uebungsblaetter $model
 */

$this->params['breadcrumbs'][] = ['label' => 'Übungsblätter hochladen', 'url' => ['uebung/alleuebungen']];
$this->params['breadcrumbs'][] = ['label' => 'Uebungsblaetters', 'url' => ['index', 'id' => $model->UebungsID]];
$this->params['breadcrumbs'][] = 'Update';

?>
<div class="uebungsblaetter-update">

    
    <!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<div class="row">
    	<div class="col-md-12">
        	<div class="row">
            	<div class="col-md-4"></div>
            	<div class="col-md-4">
            		<h3>
            			Modul: <?php echo $model->uebungs->modul->Bezeichnung ?>
            		</h3>
                	<div class="panel panel-info">
                      <div class="panel-heading"><h1>Übungsblatt<?= Html::encode($model->UebungsNr); ?></h1></div>
                      <div class="panel-body">
                      	<div class="col-md-12">
                      		
                            <?= $this->render('_form', [
                                'model' => $model,
                            ]) ?>
                            
                      	</div>
                      </div>
                    </div>
                    
                </div>
            	<div class="col-md-4"></div>
            </div>
        </div>
    </div>

</div>
