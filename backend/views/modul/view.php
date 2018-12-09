<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Modul $model
 */

$this->title = $model->ModulID;
$this->params['breadcrumbs'][] = ['label' => 'Moduls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
	<b>jfdklajfkdlsjfkl</b>
</div>

<div class="modul-view">
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
            'ModulID',
            'Bezeichnung',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->ModulID],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
