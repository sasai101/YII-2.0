<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Uebungsblaetter $model
 */

//$this->title = $model->UebungsblatterID;
$this->params['breadcrumbs'][] = ['label' => 'Uebungsblaetters', 'url' => ['index', 'id' => $model->UebungsID]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uebungsblaetter-view">
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
            'UebungsblatterID',
            'UebungsID',
            'UebungsNr',
            'Anzahl_der_Aufgabe',
            'Deadline',
            'Ausgabedatum',
            'Datein',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->UebungsblatterID],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
