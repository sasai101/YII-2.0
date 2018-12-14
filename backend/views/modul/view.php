<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Modul $model
 */

$this->title = $model->Bezeichnung;
$this->params['breadcrumbs'][] = ['label' => 'Moduls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class = "container">
    <div>
    	<div align="center" >Modul Leiter</div>
    </div>
</div>
