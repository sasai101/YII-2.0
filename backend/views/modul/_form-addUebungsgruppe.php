<?php

use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;
use common\models\Tutor;

?>

<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_inner',
    'widgetBody' => '.container-rooms',
    'widgetItem' => '.room-item',
    'limit' => 20,
    'min' => 1,
    'insertButton' => '.add-room',
    'deleteButton' => '.remove-room',
    'model' => $modelsUebungsgruppe[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'Tutor_MarterikelNr',
        'GruppenNr',
        'Max_Person',
    ],
]); ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Description</th>
            <th class="text-center">
                <button type="button" class="add-room btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span>add Übungsgruppe</button>
            </th>
        </tr>
    </thead>
    <tbody class="container-rooms">
    <?php foreach ($modelsUebungsgruppe as $indexUebungsgruppe => $modelUebungsgruppe): ?>
        <tr class="room-item">
            <td class="vcenter">
                <?php
                    // necessary for update action.
                    if (! $modelUebungsgruppe->isNewRecord) {
                        echo Html::activeHiddenInput($modelUebungsgruppe, "[{$indexUebungsgruppe}][{$indexUebungsgruppe}]UebungsgruppeID");
                    }
                ?>
                <?= $form->field($modelUebungsgruppe, "[{$indexUebungsgruppe}][{$indexUebungsgruppe}]Tutor_MarterikelNr")->dropDownList(Tutor::tutorName(),['prompt'=>'Bitte wählen Sie einen Mitarbeiter aus'])?>
                <?= $form->field($modelUebungsgruppe, "[{$indexUebungsgruppe}][{$indexUebungsgruppe}]GruppenNr")->textInput(['maxlength' => true])?>
            	<?= $form->field($modelUebungsgruppe, "[{$indexUebungsgruppe}][{$indexUebungsgruppe}]Max_Person")->textInput(['maxlength' => true])?>
            </td>
            <td class="text-center vcenter" style="width: 90px;">
                <button type="button" class="remove-room btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span></button>
            </td>
        </tr>
     <?php endforeach; ?>
    </tbody>
</table>
<?php DynamicFormWidget::end(); ?>