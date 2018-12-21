<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use common\models\Klausur;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\KlausurSuchen $searchModel
 */

$this->title = $modelModul->Bezeichnung;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="klausur-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Klausur', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'KlausurID',
            'Mitarbeiter_MarterikelNr',
            
            
//            'ModulID',
            'Kreditpunkt',
            //'Pruefungsdatum',
            [
                'attribute' => 'Pruefungsdatum',
                'format'=>['date','php:d-m-Y H:i:s'],
            ],
            'Raum', 
            'Bezeichnung', 
//            'Max_Punkte', 
//            'punkt1_0', 
//            'punkt1_3', 
//            'punkt1_7', 
//            'punkt2_0', 
//            'punkt2_3', 
//            'punkt3_0', 
//            'punkt3_3', 
//            'punkt3_7', 
//            'punkt4_0', 

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl(['klausur/view', 'id' => $model->KlausurID, 'edit' => 't']),
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
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index','id'=>$modelModul->ModulID], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]); Pjax::end(); ?>

</div>
