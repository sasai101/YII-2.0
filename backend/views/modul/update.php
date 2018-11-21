<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Modul $model
 */

$this->title = 'Update Modul: ' . ' ' . $model->ModulID;
$this->params['breadcrumbs'][] = ['label' => 'Moduls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ModulID, 'url' => ['view', 'id' => $model->ModulID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="modul-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
