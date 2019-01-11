<?php

use yii\helpers\Html;
use common\models\Tutor;
use wbraganca\dynamicform\DynamicFormWidget;
use common\models\Korrektor;

?>

<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_inner',
    'widgetBody' => '.container-rooms',
    'widgetItem' => '.room-item',
    'limit' => 30,
    'min' => 1,
    'insertButton' => '.add-uebungsgruppe',
    'deleteButton' => '.remove-uebungsgruppe',
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
            <th>Übungsgruppe</th>
            <th class="text-center">
                <button type="button" class="add-uebungsgruppe btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span></button>
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
                        echo Html::activeHiddenInput($modelUebungsgruppe, "[{$indexUebung}][{$indexUebungsgruppe}]UebungsgruppeID");
                    }
                ?>
                <?= $form->field($modelUebungsgruppe, "[{$indexUebung}][{$indexUebungsgruppe}]Tutor_MarterikelNr")->dropDownList(Tutor::tutorName(),['prompt'=>'Bitte wählen Sie einen Mitarbeiter aus'])?>
                <?= $form->field($modelUebungsgruppe, "[{$indexUebung}][{$indexUebungsgruppe}]GruppenNr")->textInput(['maxlength' => true])?>
            	<?= $form->field($modelUebungsgruppe, "[{$indexUebung}][{$indexUebungsgruppe}]Max_Person")->textInput(['maxlength' => true])?>
                <?= $form->field($modelUebungsgruppe, "[{$indexUebung}][{$indexUebungsgruppe}]Korrektor_MarterikelNr")->dropDownList(Korrektor::KorrektorName(),['prompt'=>'Bitte wählen Sie einen Mitarbeiter aus'])?>
            </td>
            <td class="text-center vcenter" style="width: 90px;">
                <button type="button" class="remove-uebungsgruppe btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span></button>
            </td>
        </tr>
     <?php endforeach; ?>
    </tbody>
</table>
<?php DynamicFormWidget::end(); ?>
