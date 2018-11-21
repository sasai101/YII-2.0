<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Uebung $model
 */

$this->title = $model->UebungsID;
$this->params['breadcrumbs'][] = ['label' => 'Uebungs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uebung-view">
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
            'UebungsID',
            'ModulID',
            'Mitarbeiter_MarterikelNr',
            'Bezeichnung',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->UebungsID],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
