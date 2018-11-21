<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Klausurnote $model
 */

$this->title = 'Create Klausurnote';
$this->params['breadcrumbs'][] = ['label' => 'Klausurnotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="klausurnote-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
