<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Abgabe $model
 */

$this->title = 'Create Abgabe';
$this->params['breadcrumbs'][] = ['label' => 'Abgabes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abgabe-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
