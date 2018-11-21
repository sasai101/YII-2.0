<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\ModulGehoertKlausurnote $model
 */

$this->title = 'Update Modul Gehoert Klausurnote: ' . ' ' . $model->Modul_ID;
$this->params['breadcrumbs'][] = ['label' => 'Modul Gehoert Klausurnotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Modul_ID, 'url' => ['view', 'Modul_ID' => $model->Modul_ID, 'Klausurnote_ID' => $model->Klausurnote_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="modul-gehoert-klausurnote-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
