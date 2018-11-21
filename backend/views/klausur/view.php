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
            '1.0',
            '1.3',
            '1.7',
            '2.0',
            '2.3',
            '3.0',
            '3.3',
            '3.7',
            '4.0',
            '5.0',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->KlausurID],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
