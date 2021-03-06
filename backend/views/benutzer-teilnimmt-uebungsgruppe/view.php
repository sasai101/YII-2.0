<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\BenutzerTeilnimmtUebungsgruppe $model
 */

$this->title = $model->Benuter_MarterikelNr;
$this->params['breadcrumbs'][] = ['label' => 'Benutzer Teilnimmt Uebungsgruppes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="benutzer-teilnimmt-uebungsgruppe-view">
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
            'Benuter_MarterikelNr',
            'UebungsgruppeID',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->Benuter_MarterikelNr],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
