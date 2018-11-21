<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Einzelaufgabe $model
 */

$this->title = 'Create Einzelaufgabe';
$this->params['breadcrumbs'][] = ['label' => 'Einzelaufgabes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="einzelaufgabe-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
