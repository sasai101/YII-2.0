<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use common\models\Tutor;

/**
 *
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\TutorSuchen $searchModel
 */

$this->title = 'Tutors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutor-index">
	<div class="page-header">
		<h1><?= Html::encode($this->title) ?></h1>
	</div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Tutor', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php

Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            // ['class' => 'yii\grid\SerialColumn'],

            // 'MarterikelNr',
            [
                'attribute' => 'MarterikelNr',
                'contentOptions' => [
                    'width' => '130px'
                ]
            ],

            // Exm
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },

                'detail' => function ($model, $key, $index, $column) {
                    $modelTutor = Tutor::findOne($model->MarterikelNr);

                    return Yii::$app->controller->renderPartial('_tutordetails', [
                        'modelTutor' => $modelTutor
                    ]);
                }
            ],

            // 'benutzername',
            [
                'attribute' => 'benutzername',
                'label' => 'Benutzername',
                'value' => 'benutzername'
            ],
            // 'vorname',
            [
                'attribute' => 'vorname',
                'label' => 'Vorname',
                'value' => 'vorname'
            ],
            // 'nachname',
            [
                'attribute' => 'nachname',
                'label' => 'Nachname',
                'value' => 'nachname'
            ],
            // 'email',
            [
                'attribute' => 'email',
                'label' => 'Email',
                'value' => 'email'
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}'
            ]
        ],
        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,

        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ' . Html::encode($this->title) . ' </h3>',
            'type' => 'info',
            // 'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', [
                'index'
            ], [
                'class' => 'btn btn-info'
            ]),
            'showFooter' => false
        ]
    ]);
    Pjax::end();
    ?>

</div>
