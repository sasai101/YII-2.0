<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use common\models\Mitarbeiter;
use common\models\Professor;

/**
 * @var yii\web\View $this
 * @var common\models\Benutzer $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="benutzer-form">

	<?php $form = ActiveForm::begin(); ?>
			
		<?= $form->field($model, 'file')->fileInput() ?>
    
		<?= $form->field($model, 'email')->textInput() ?>

		<?= $form->field($model, 'Vorname')->textInput() ?>
		
		<?= $form->field($model, 'Nachname')->textInput() ?>
		
        <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>


</div>
