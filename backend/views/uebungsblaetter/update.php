<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Uebungsblaetter $model
 */

$this->params['breadcrumbs'][] = ['label' => 'Uebungsblaetters', 'url' => ['index', 'id' => $model->UebungsID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="uebungsblaetter-update">

	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Titel -->
	<div>
		<h3>
			Übungsblatt<?= Html::encode($model->UebungsNr); ?>
		</h3>
	</div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
