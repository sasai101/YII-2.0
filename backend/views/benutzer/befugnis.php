<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Benutzer $model
 */
// Den ganzen Name von Benutzer in der Titelzeil zeigen
$this->title = $model->Vorname." ".$model->Nachname;
$this->params['breadcrumbs'][] = ['label' => 'Benutzers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="benutzer-befugnis">
	<div><br></div>
    <div class="row">
    	<div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
			  
		  		<?php $form = ActiveForm::begin()?>
		  		
			  		<!--  Checkbox list -->
			  		<?php echo Html::checkboxList('neueBefugnis',$AuthAssignmentInArray,$allBefugnisseInArray)?>
			  		
			  		<?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>

				<?php ActiveForm::end(); ?>
		  
			  </div>
            </div>
        </div>
    </div>
	
</div>