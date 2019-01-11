<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Modul $model
 */

$this->title = 'Modulerstellung';
$this->params['breadcrumbs'][] = ['label' => 'Alle Modul', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Modulerstellung';
?>
<div class="modul-create">

	<div class="row"></br></div>
	
	<div class="panel panel-default">
    <div class="panel-body">

	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Titel -->
	
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>	


	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
              <div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
              	<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<?= $this->render('_dynamicForm', [
                                'modelModul' => $modelModul,
                                'modelsProfessor' => $modelsProfessor,
                                'modelsUebung' => $modelsUebung,
                                'modelsUebungsgruppe' => $modelsUebungsgruppe,
                            ]) ?>					
						</div>
					</div>
				</div>
            </div>
		</div>
	</div>
	</div>
  	</div>

</div>
