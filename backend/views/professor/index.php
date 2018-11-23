<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\ProfessorSuchen $searchModel
 */

$this->title = 'Professors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Professor', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            
            //'MarterikelNr',
            [
                'attribute' => 'MarterikelNr',
                'contentOptions'=>['width'=>'130px'],
            ],
            //'benutzername',
            [
                'attribute' => 'benutzername',
                'label' => 'Benutzername',
                'value' => 'benutzername',
            ],
            //'email',
            [
                'attribute' => 'email',
                'label' => 'Email',
                'value' => 'email'
            ],
            //'vorname',
            [
                'attribute' => 'vorname',
                'label' => 'Vorname',
                'value' => 'vorname'
            ],
            //'nachname',
            [
                'attribute' => 'nachname',
                'label' => 'Nachname',
                'value' => 'nachname'
            ],
            'Buero',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl(['professor/view', 'id' => $model->MarterikelNr, 'edit' => 't']),
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
            //'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]); Pjax::end(); ?>

</div>
