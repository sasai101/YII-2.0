<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\KlausurnoteSuchen $searchModel
 */

$this->title = 'Modul '.$modelModul->Bezeichnung;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="klausurnote-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Klausurnote', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'KlausurnoteID',
            //'Mitarbeiter_MarterikelNr',
            
            //'Benutzer_MarterikelNr',
            [
                'attribute' => 'Benutzer_MarterikelNr',
                'label' => 'MarterikelNr',
                'contentOptions'=>['width'=>'130px'],
            ],
            
            //Benutzervorname
            [
                'attribute' => 'vorname',
                'label' => 'Vorname',
                'value' => 'vorname'
            ],
            //Benutzernachname
            [
                'attribute' => 'nachname',
                'label' => 'Nachname',
                'value' => 'nachname'
            ],
            
            //'Punkt', 
            [
                'attribute' => 'Punkt',
                'contentOptions' => ['width'=>'100px']
            ],
            //'Note',
            [
                'attribute' => 'Note',
                'contentOptions'=>['width'=>'100px'],
            ],
            //'KorregierteZeit',
            'Bezeichnung',
            [
                'attribute'=>'KorregierteZeit',
                'format'=>['date','php:d-m-Y H:i:s'],
            ],
            //'ModulID', 
           

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl(['klausurnote/view', 'id' => $model->KlausurnoteID, 'edit' => 't']),
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
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index', 'id'=>$modelModul->ModulID], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]); Pjax::end(); ?>

</div>
