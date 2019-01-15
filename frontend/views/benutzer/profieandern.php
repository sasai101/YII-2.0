<?php
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Benutzer $model
 */

?>
<div class="benutzer-profieandern">

	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Profieänderung
                </h3>
            </div>
            <div class="panel-body">
            	<div class="benutzer-form">

                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
            	
            	</div>
            </div>
        	</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>