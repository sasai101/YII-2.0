<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Klausur $model
 */

$this->title = $model->KlausurID;
$this->params['breadcrumbs'][] = ['label' => 'Klausurs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="klausur-view">
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
            'KlausurID',
            'Mitarbeiter_MarterikelNr',
            'ModulID',
            'Kreditpunkt',
            'Pruefungsdatum',
            'Raum',
            'Bezeichnung',
            'Max_Punkte',
            'punkt1_0',
            'punkt1_3',
            'punkt1_7',
            'punkt2_0',
            'punkt2_3',
            'punkt3_0',
            'punkt3_3',
            'punkt3_7',
            'punkt4_0',
            'punkt5_0',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->KlausurID],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
