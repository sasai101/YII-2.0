<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Mitarbeiter $model
 */

$this->title = 'Update Mitarbeiter: ' . ' ' . $model->MarterikelNr;
$this->params['breadcrumbs'][] = ['label' => 'Mitarbeiters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MarterikelNr, 'url' => ['view', 'id' => $model->MarterikelNr]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mitarbeiter-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
