<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Uebungsblaetter $model
 */

$this->title = 'Update Uebungsblaetter: ' . ' ' . $model->UebungsblatterID;
$this->params['breadcrumbs'][] = ['label' => 'Uebungsblaetters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->UebungsblatterID, 'url' => ['view', 'id' => $model->UebungsblatterID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="uebungsblaetter-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
