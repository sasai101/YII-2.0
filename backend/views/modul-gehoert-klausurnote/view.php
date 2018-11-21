<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\ModulGehoertKlausurnote $model
 */

$this->title = $model->Modul_ID;
$this->params['breadcrumbs'][] = ['label' => 'Modul Gehoert Klausurnotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modul-gehoert-klausurnote-view">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>


    <?= DetailView::widget([
        'model' => $model,
        'condensed' => false,
        'hover' => true,
        'mode' => Yii::$app->request->get('edit') == 't' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
        'panel' => [
            'heading' => $this->title,
            'type' => DetailView::TYPE_INFO,
        ],
        'attributes' => [
            'Modul_ID',
            'Klausurnote_ID',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->Modul_ID],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
