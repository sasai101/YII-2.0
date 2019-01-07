<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use common\models\Professor;
use common\models\Mitarbeiter;

?>

<div class="customer-form">

    <?php $form = ActiveForm::begin([
        'id' => 'dynamic-form',
        'enableAjaxValidation'=>true,
    ]); ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-graduation-cap"></i> Modul
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body container-prof">
                     <?= $form->field($modelModul, 'Bezeichnung')->textInput(['maxlength' => true]) ?>
                </div>
             </div>
         </div>
     </div>
        

    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', 
        'widgetBody' => '.container-prof', 
        'widgetItem' => '.prof-item', 
        'limit' => 4, 
        'min' => 1, 
        'insertButton' => '.add-prof', 
        'deleteButton' => '.remove-prof', 
        'model' => $modelsProfessor[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'Professor_MarterikelNr',
        ],
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-graduation-cap"></i> Professor
            <button type="button" class="pull-right add-prof btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Professor</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-prof"><!-- widgetContainer -->
            <?php foreach ($modelsProfessor as $index => $professor): ?>
                <div class="prof-item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title">Professor: </span>
                        <button type="button" class="pull-right remove-prof btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (!$professor->isNewRecord) {
                                echo Html::activeHiddenInput($professor, "[{$index}]ModulID");
                            }
                        ?>
                        <!-- Dorpdownlist für Professor -->
                        <?= $form->field($professor, "[{$index}]Professor_MarterikelNr")->dropDownList(Professor::profName(),['prompt'=>'Bitte wählen Sie einen Professor aus']) ?>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>
    
    
    
    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>

    <?php DynamicFormWidget::begin([
	    'widgetContainer' => 'dynamicform_wrapper',
	    'widgetBody' => '.container-uebung',
	    'widgetItem' => '.uebung-item',
	    'limit' => 10,
	    'min' => 1,
	    'insertButton' => '.add-uebung',
	    'deleteButton' => '.remove-uebung',
	    'model' => $modelsUebung[0],
	    'formId' => 'dynamic-form',
	    'formFields' => [
	        'Mitarbeiter_MarterikelNr',
	        'Bezeichnung',
	    ],
	    	    
	]); ?>
	
	<div class="panel panel-default">
		<div class="panel-heading">
            <i class="fa fa-group"></i> Übungen und Übungsgruppe
            <!--  <button type="button" class="pull-right add-uebung btn btn-success btn-xs"><span class="fa fa-plus">Add Übungen</span></button> -->
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-prof">
        
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Übungen</th>
                        <th style="width: 450px;">Übungsgruppe</th>
                        <th class="text-center" style="width: 90px;">
                            
                        </th>
                    </tr>
                </thead>
                <tbody class="container-uebung">
                <?php foreach ($modelsUebung as $indexUebung => $modelUebung): ?>
                
                    <tr class="uebung-item">
                        <td class="vcenter">
                            <?php
                                // necessary for update action.
                                if (! $modelUebung->isNewRecord) {
                                    echo Html::activeHiddenInput($modelUebung, "[{$indexUebung}]UebungsID");
                                }
                            ?>
                            <!-- Anderung -->
                            <p><b>Wissenschaftlicher Mitarbeiter</b></p>
                            <?= $form->field($modelUebung, "[{$indexUebung}]Mitarbeiter_MarterikelNr")->dropDownList(Mitarbeiter::mitarbeiterName(),['prompt'=>'Bitte wählen Sie einen Mitarbeiter aus']) ?>
                            <p><b>Übungsverzeichnis</b></p>
                            <?= $form->field($modelUebung, "[{$indexUebung}]Bezeichnung")->label(false)->textInput(['maxlength' => true]) ?>
                            <p><b>Zulassungsgrenze(1~100)%</b></p>
                            <?= $form->field($modelUebung, "[{$indexUebung}]Zulassungsgrenze")->label(false)->textInput(['maxlength' => true]) ?>
                        </td>
                        <td>
                            <?= $this->render('_form-addUebungsgruppe', [
                                'form' => $form,
                                'indexUebung' => $indexUebung,
                                'modelsUebungsgruppe' => $modelsUebungsgruppe[$indexUebung],
                            ]) ?>
                        </td>
                        <td class="text-center vcenter" style="width: 90px; verti">
                            <button type="button" class="remove-uebung btn btn-danger btn-xs"><span class="fa fa-minus"></span></button>
                        </td>
                    </tr>
                 
                 <?php endforeach; ?>
                </tbody>
            </table>
            
    	</div>
    </div>
    <?php DynamicFormWidget::end(); ?>
    
    

    <div class="form-group">
        <?= Html::submitButton($modelModul->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>