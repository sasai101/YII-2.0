<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Uebungsblaetter $model
 */

$this->params['breadcrumbs'][] = ['label' => 'Uebungsblaetters', 'url' => ['index', 'id' => $modelUebung->UebungsID]];
$this->params['breadcrumbs'][] = 'Neue Übungsblatt';
?>
<div class="uebungsblaetter-create">

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
                	<div class="panel panel-info">
                      <div class="panel-heading"><h1><h3>neue Übungsblatt</h3></h1></div>
                      <div class="panel-body">
                      	<div class="col-md-12">
                      		<div class="benutzer-form">
		
                                <?= $this->render('_form', [
                                    'model' => $model,
                                ]) ?>

                    		</div>
                      	</div>
                      </div>
                    </div>
                    
                </div>
            	<div class="col-md-4"></div>
            </div>
        </div>
    </div>
</div>