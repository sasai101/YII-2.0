<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Einzelaufgabe $model
 */

$this->title = 'Update Einzelaufgabe: ' . ' ' . $model->EinzelaufgabeID;
$this->params['breadcrumbs'][] = ['label' => 'Einzelaufgabes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->EinzelaufgabeID, 'url' => ['view', 'id' => $model->EinzelaufgabeID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="einzelaufgabe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
