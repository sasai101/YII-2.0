<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Uebungsblaetter $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="uebungsblaetter-form">
    
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-3">
    
    	<div align="center">
    	
    		<!-- Anzahl der Aufgabe -->
            <div class="row">
            	<div class="col-md-8">
            		<?= $form->field($model, 'Anzahl_der_Aufgabe')->textInput() ?>
            	</div>
            </div>
            <!-- Gesamtepunkte -->
            <div class="row">
            	<div class="col-md-8">
            		<?= $form->field($model, 'GesamtePunkte')->textInput() ?>
            	</div>
            </div>
            
            <!-- Datetimepicker -->
            <div class="row">
            	<div class="col-md-8">
            		<?= $form->field($model, 'Deadline')->widget(
                        'trntv\yii\datetime\DateTimeWidget',
                        [
                            'clientOptions' => [
                                'minDate' => new \yii\web\JsExpression(time() + 60*60*60),
                                'allowInputToggle' => true,
                                'sideBySide' => true,
                                'locale' => 'de',
                                'widgetPositioning' => [
                                    'horizontal' => 'auto',
                                    'vertical' => 'auto'
                                ]
                            ]
                        ]
                    ) ?>
            	</div>
            </div>

        </div>
        
        <!-- Leere Zeile -->
    	<div class="row"></br></div>
    	<!-- Leere Zeile -->
    	<div class="row"></br></div>	
            
        <!-- Create Button -->
        <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    	</div>
        
    </div>
    
    <div class="col-md-8">
   	    <?= $form->field($model, 'file')->fileInput() ?>
    </div>

    <?php ActiveForm::end(); ?>
    

</div>
