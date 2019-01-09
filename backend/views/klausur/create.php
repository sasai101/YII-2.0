<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Klausur $model
 */

$this->title = 'Create Klausur';
$this->params['breadcrumbs'][] = ['label' => 'Klausurs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="klausur-create">

	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<div class="panel panel-default">
    <div class="panel-body">
		
		<!-- Titel -->
	<div>
		<h3>
			<?= Html::encode($model->modul->Bezeichnung); ?>
		</h3>
	</div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

		
	</div>
  	</div>
</div>
