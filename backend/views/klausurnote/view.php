<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Klausurnote $model
 */

$this->title = $model->KlausurnoteID;
$this->params['breadcrumbs'][] = ['label' => 'Klausurnotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="klausurnote-view">
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
            'KlausurnoteID',
            'Mitarbeiter_MarterikelNr',
            'Benutzer_MarterikelNr',
            'Note',
            'Bezeichnung',
            'Punkt',
            'KorregierteZeit',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->KlausurnoteID],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
