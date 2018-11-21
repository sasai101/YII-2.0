<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Klausur $model
 */

$this->title = 'Create Klausur';
$this->params['breadcrumbs'][] = ['label' => 'Klausurs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="klausur-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
