<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Einzelaufgabe $model
 */

$this->title = $model->EinzelaufgabeID;
$this->params['breadcrumbs'][] = ['label' => 'Einzelaufgabes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="einzelaufgabe-view">
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
            'EinzelaufgabeID',
            'AbgabeID',
            'UebungsblaetterID',
            'AufgabeNr',
            'Text:ntext',
            'Datein:ntext',
            'Punkte',
            'Bewertung',
            'Max.Punkt',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->EinzelaufgabeID],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
