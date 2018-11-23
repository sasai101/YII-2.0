<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Professor $model
 */

// Die Name von Mitarbeiter in der Titelposition zu zeigen
$this->title = $model->marterikelNr->Vorname." ".$model->marterikelNr->Nachname;
$this->params['breadcrumbs'][] = ['label' => 'Professors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-view">
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
            [
                'label' => 'Benutzername',
                'value' => $model->marterikelNr->Benutzername,
            ],
            [
                'label' => 'Vorname',
                'value' => $model->marterikelNr->Vorname,
            ],
            [
                'label' => 'Nachname',
                'value' => $model->marterikelNr->Nachname,
            ],
            [
                'label' => 'Email',
                'value' => $model->marterikelNr->email,
            ],
            'Buero',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->MarterikelNr],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
