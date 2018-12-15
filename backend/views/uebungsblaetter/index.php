<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\UebungsblaetterSuchen $searchModel
 */

$this->title = $modelUebung->Bezeichnung;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uebungsblaetter-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Uebungsblaetter', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'UebungsblatterID',
            //'UebungsID',
            [
                'attribute' => 'UebungsID',
                'value' => 'uebungs.Bezeichnung',
            ],
            //'UebungsNr',
            [
                'attribute' => 'UebungsNr',
                'value' => function ($model) {
                    return "Übungsbätter ".$model->UebungsNr;
                }
            ],
            'Anzahl_der_Aufgabe',
            'GesamtePunkte',
            //'Deadline',
            [
                'attribute' => 'Ausgabedatum',
                'format' => ['date', 'php:d-m-Y H:i:s']
            ],
            
            //'Ausgabedatum', 
            [
                'attribute'=> 'Deadline',
                'format' => ['date','php:d-m-Y H:i:s'],
            ],
            
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl(['uebungsblaetter/update', 'id' => $model->UebungsblatterID, 'edit' => 't']),
                            ['title' => Yii::t('yii', 'Edit'),]
                        );
                    }
                ],
            ],
        ],
        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,

        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type' => 'info',
            // Add Funktion die ÜbungsID in der Create Funktion weiterführen,damit die erstellte Übungsblätte an richtiger Übung geht.
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create','id' => $modelUebung->UebungsID], ['class' => 'btn btn-success']),
            // Hier 'id' => $modelUebung->UebungsID erfullen ,sonst 404, Da kein ID gefunden
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index','id' => $modelUebung->UebungsID], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]); Pjax::end(); ?>

</div>
