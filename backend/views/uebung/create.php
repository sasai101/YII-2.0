<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Uebung $model
 */

$this->title = 'Create Uebung';
$this->params['breadcrumbs'][] = ['label' => 'Uebungs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uebung-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
