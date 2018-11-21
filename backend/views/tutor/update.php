<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Tutor $model
 */

$this->title = 'Update Tutor: ' . ' ' . $model->MarterikelNr;
$this->params['breadcrumbs'][] = ['label' => 'Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MarterikelNr, 'url' => ['view', 'id' => $model->MarterikelNr]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tutor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
