<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Klausurnote $model
 */

$this->title = 'Update Klausurnote: ' . ' ' . $model->KlausurnoteID;
$this->params['breadcrumbs'][] = ['label' => 'Klausurnotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KlausurnoteID, 'url' => ['view', 'id' => $model->KlausurnoteID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="klausurnote-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
