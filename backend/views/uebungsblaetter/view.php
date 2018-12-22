<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Uebungsblaetter $model
 */
?>
<div class="uebungsblaetter-view">
	
	<!-- Übungsblätter -->
    <div>
    	<iframe src=<?= $model->Datein ?> style="width:100%;height:700px;"></iframe>
    </div>
  
</div>
