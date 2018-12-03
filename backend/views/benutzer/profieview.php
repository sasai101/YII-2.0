<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Benutzer $model
 */

// Den ganzen Name von Benutzer in der Titelzeil zeigen
$this->title = $model->Vorname." ".$model->Nachname;
$this->params['breadcrumbs'][] = ['label' => 'Benutzers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="benutzer-view">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>


    <?= DetailView::widget([
        'model' => $model,
        'condensed' => false,
        'hover' => true,
        'mode' => Yii::$app->request->get('edit') == 't' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
        /*'panel' => [
            'heading' => $this->title,
            'type' => DetailView::TYPE_INFO,
        ],*/
        'attributes' => [
            'MarterikelNr',
            'Benutzername',
            'email:email',
            //'password_hash',
            //'password_reset_token',
            //'auth_key',
            'Vorname',
            'Nachname',
            [
                'attribute' => 'created_at',
                'format'=>['date','php:d-m-Y H:i:s'],
            ],
            //'updated_at',
            [
                'attribute' => 'updated_at',
                'format'=>['date','php:d-m-Y H:i:s'],
            ],
            
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->MarterikelNr],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
