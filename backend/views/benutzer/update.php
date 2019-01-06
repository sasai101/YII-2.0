<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Benutzer $model
 */

$this->title = 'Update Benutzer: ' . ' ' . $model->Benutzername;
$this->params['breadcrumbs'][] = ['label' => 'Benutzers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Vorname." ".$model->Nachname, 'url' => ['view', 'id' => $model->MarterikelNr]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="benutzer-update">

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
                      <div class="panel-heading"><h1><?= Html::encode($model->Vorname." ".$model->Nachname." ".$model->MarterikelNr) ?></h1></div>
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
