<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use yii\widgets\ActiveForm;
//use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Benutzer */

//$this->title = "Passwortveränderung";
$this->title = $model1->Vorname." ".$model1->Nachname;
$this->params['breadcrumbs'][] = ['label' => 'Benutzer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="benutzer-form">

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
                      <div class="panel-heading"><h1><?= Html::encode($model1->Vorname." ".$model1->Nachname." ".$model1->MarterikelNr) ?></h1></div>
                      <div class="panel-body">
                      	<div class="col-md-12">
                      		<div class="benutzer-form">
		
                    		    <?php $form = ActiveForm::begin(); ?>
                    		 		
                    		    <?= $form->field($model, 'Passwort')->passwordInput(['maxlength' => true]) ?>
                    		    
                    		    <?= $form->field($model, 'Passwort_widerholung')->passwordInput(['maxlength' => true]) ?>
                    		
                    		    <div class="form-group">
                    		        <?= Html::submitButton('Speichern', ['class' =>'btn btn-success']) ?>
                    		    </div>
                    		   
                    		    <?php ActiveForm::end(); ?>
                    		
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