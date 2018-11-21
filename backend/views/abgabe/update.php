<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Abgabe $model
 */

$this->title = 'Update Abgabe: ' . ' ' . $model->AbgabeID;
$this->params['breadcrumbs'][] = ['label' => 'Abgabes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->AbgabeID, 'url' => ['view', 'id' => $model->AbgabeID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="abgabe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
