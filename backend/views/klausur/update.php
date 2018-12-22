<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/**
 * @var yii\web\View $this
 * @var common\models\Klausur $model
 */

$this->title = 'Klausur update';
$this->params['breadcrumbs'][] = ['label' => 'Alle Modul', 'url' => ['klausurlistview', 'id'=>$model->ModulID]];
$this->params['breadcrumbs'][] = ['label' => HtmlPurifier::process(mb_substr($model->modul->Bezeichnung, 0, 15).'......'), 'url' => ['index', 'id'=>$model->ModulID]];
$this->params['breadcrumbs'][] = 'Klausuränderung';
?>
<div class="klausur-update">

	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
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
