<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Mitarbeiter $model
 */

$this->title = $model->MarterikelNr;
$this->params['breadcrumbs'][] = ['label' => 'Mitarbeiters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mitarbeiter-view">
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
            'MarterikelNr',
            'Buero',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->MarterikelNr],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
