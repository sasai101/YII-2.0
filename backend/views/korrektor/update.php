<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Korrektor $model
 */

$this->title = 'Update Korrektor: ' . ' ' . $model->MarterikelNr;
$this->params['breadcrumbs'][] = ['label' => 'Korrektors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MarterikelNr, 'url' => ['view', 'id' => $model->MarterikelNr]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="korrektor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
