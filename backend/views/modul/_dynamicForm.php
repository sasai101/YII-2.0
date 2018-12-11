<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use common\models\Professor;
use common\models\Mitarbeiter;

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});
    
jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($modelModul, 'Bezeichnung')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($modelModul, 'Maximale_Person')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be cloned (default 999)
        'min' => 1, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsProfessor[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'Professor_MarterikelNr',
        ],
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-envelope"></i> Professor
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Professor</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($modelsProfessor as $index => $professor): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-address">Professor: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
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
        'widgetBody' => '.container-ubung',
        'widgetItem' => '.house-item',
        'limit' => 10,
        'min' => 1,
        'insertButton' => '.add-house',
        'deleteButton' => '.remove-house',
        'model' => $modelsUebung[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'Mitarbeiter_MarterikelNr',
            'Bezeichnung',
        ],
    ]); ?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Übungen</th>
                <th style="width: 450px;">Übungsgruppen</th>
                <th class="text-center" style="width: 90px;">
                    <button type="button" class="add-house btn btn-success btn-xs"><span class="fa fa-plus"></span>add Übung</button>
                </th>
            </tr>
        </thead>
        <tbody class="container-ubung">
        <?php foreach ($modelsUebung as $indexUebung => $modelUebung): ?>
            <tr class="house-item">
                <td class="vcenter">
                    <?php
                        // necessary for update action.
                        if (! $modelUebung->isNewRecord) {
                            echo Html::activeHiddenInput($modelUebung, "[{$indexUebung}]UebungsID");
                        }
                    ?>
                    <p><b>Wissenschaftlicher Mitarbeiter</b></p>
                    <?= $form->field($modelUebung, "[{$indexUebung}]Mitarbeiter_MarterikelNr")->dropDownList(Mitarbeiter::mitarbeiterName(),['prompt'=>'Bitte wählen Sie einen Mitarbeiter aus']) ?>
                    <p><b>Übungsverzeichnis</b></p>
                    <?= $form->field($modelUebung, "[{$indexUebung}]Bezeichnung")->label(false)->textInput(['maxlength' => true]) ?>
                </td>
                <td>
                    <?= $this->render('_form-addUebungsgruppe', [
                        'form' => $form,
                        'indexUbung' => $indexUebung,
                        'modelsUebungsgruppe' => $modelsUebungsgruppe[$indexUebung],
                    ]) ?>
                </td>
                <td class="text-center vcenter" style="width: 90px; verti">
                    <button type="button" class="remove-house btn btn-danger btn-xs"><span class="fa fa-minus"></span></button>
                </td>
            </tr>
         <?php endforeach; ?>
        </tbody>
    </table>
    <?php DynamicFormWidget::end(); ?>
    
    

    <div class="form-group">
        <?= Html::submitButton($professor->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>