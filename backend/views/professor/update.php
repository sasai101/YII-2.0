<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Professor $model
 */

$this->title = 'Update Professor: ' . ' ' . $model->MarterikelNr;
$this->params['breadcrumbs'][] = ['label' => 'Professors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MarterikelNr, 'url' => ['view', 'id' => $model->MarterikelNr]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="professor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
