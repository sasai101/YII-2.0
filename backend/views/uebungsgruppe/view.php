<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Uebungsgruppe $model
 */

$this->title = $model->UebungsgruppeID;
$this->params['breadcrumbs'][] = ['label' => 'Uebungsgruppes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uebungsgruppe-view">
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
            'UebungsgruppeID',
            'UebungsID',
            'Tutor_MarterikelNr',
            'Anzahl_der_Personen',
            'GruppenNr',
            'Max_Person',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->UebungsgruppeID],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
