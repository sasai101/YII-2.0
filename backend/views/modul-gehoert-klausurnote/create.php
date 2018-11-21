<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\ModulGehoertKlausurnote $model
 */

$this->title = 'Create Modul Gehoert Klausurnote';
$this->params['breadcrumbs'][] = ['label' => 'Modul Gehoert Klausurnotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modul-gehoert-klausurnote-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
