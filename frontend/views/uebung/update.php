<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Uebung */

$this->title = 'Update Uebung: ' . $model->UebungsID;
$this->params['breadcrumbs'][] = ['label' => 'Uebungs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->UebungsID, 'url' => ['view', 'id' => $model->UebungsID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="uebung-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
