<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Klausur $model
 */

$this->title = 'Update Klausur: ' . ' ' . $model->KlausurID;
$this->params['breadcrumbs'][] = ['label' => 'Klausurs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KlausurID, 'url' => ['view', 'id' => $model->KlausurID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="klausur-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
