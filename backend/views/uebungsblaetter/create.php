<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Uebungsblaetter $model
 */

$this->params['breadcrumbs'][] = ['label' => 'Uebungsblaetters', 'url' => ['index', 'id' => $modelUebung->UebungsID]];
$this->params['breadcrumbs'][] = 'Neue Übungsblatt';
?>
<div class="uebungsblaetter-create">

	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Titel -->
	<div>
		<h3>
			neue Übungsblatt
		</h3>
	</div>

	<!-- Leere Zeile -->
	<div class="row"></br></div>

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>