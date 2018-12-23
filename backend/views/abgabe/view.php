<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Abgabe $model
 */

$this->title = $model->AbgabeID;
$this->params['breadcrumbs'][] = ['label' => 'Abgabes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abgabe-view">
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
            'AbgabeID',
            'Benutzer_MarterikelNr',
            'Korrektor_MarterikelNr',
            'KorregierteZeit',
            'AbgabeZeit',
            'GesamtePunkt',
            'UebungsblaetterID',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->AbgabeID],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
