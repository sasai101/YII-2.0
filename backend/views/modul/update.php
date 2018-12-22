<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Modul $model
 */


$this->title = 'Moduleränderung';
$this->params['breadcrumbs'][] = ['label' => 'Alle Modul', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Moduleränderung';
?>
<div class="modul-update">

	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Titel -->
	
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>	
	
	<div class="page-header">
    	<h1><?= Html::encode($this->title) ?></h1>
	</div>
	
    <?= $this->render('_dynamicForm', [
        'modelModul' => $modelModul,
        'modelsProfessor' => $modelsProfessor,
        'modelsUebung' => $modelsUebung,
        'modelsUebungsgruppe' => $modelsUebungsgruppe,
    ]) ?>

</div>
