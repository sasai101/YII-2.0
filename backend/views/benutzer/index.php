<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\BenutzerSuchen $searchModel
 */

$this->title = 'Benutzers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="benutzer-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Benutzer', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'MarterikelNr',
            [
                'attribute'=>'MarterikelNr',
                'label'=>'Marterikel Nr.'
            ],
            'Benutzername', 
            //'password_hash',
            //'password_reset_token',
            //'auth_key',
            'Vorname', 
            'Nachname',
            'email:email',
            //'created_at', 
            [
                'attribute' => 'created_at',
                'format'=>['date','php:d-m-Y H:i:s'],
            ],
            //'updated_at', 
            [
                'attribute' => 'updated_at',
                'format'=>['date','php:d-m-Y H:i:s'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {passwortveranderung} {befugnis} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl(['benutzer/view', 'id' => $model->MarterikelNr, 'edit' => 't']),
                            ['title' => Yii::t('yii', 'Edit'),]
                        );
                    }
                ],
                'buttons'=>[
                    'passwortveranderung'=>function($url,$model,$key)
                    {
                        $options=[
                            'title'=>Yii::t('yii','Passwortverändern'),
                            'aria-label'=>Yii::t('yii','Passwortverändern'),
                            'data-pjax'=>'0',
                            
                        ];
                        return Html::a('<span class="glyphicon glyphicon-lock"></span>',$url,$options);
                    },
                
                    'befugnis'=>function($url,$model,$key)
                    {
                        $options=[
                            'title'=>Yii::t('yii','Befugnis'),
                            'aria-label'=>Yii::t('yii','Befugnis'),
                            'data-pjax'=>'0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-user"></span>',$url,$options);
                    },
                 ]
            ],
        ],
        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,

        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type' => 'info',
            //'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]); Pjax::end(); ?>

</div>


