<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use common\models\Modul;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\ModulSuchen $searchModel
 */

$this->title = 'Moduls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modul-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Modul', ['create'], ['class' => 'btn btn-success'])  ?>
    </p>
    <div class = "row">
        <?php Pjax::begin(); echo ListView::widget([
              'dataProvider' => $dataProvider,
              'itemView' => '_modulListviewItem',
              'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
              'itemOptions' => [
                'tag' => 'div',
                'class' => 'col-lg-3'
              ],
              
              'pager' => [
               
                'maxButtonCount' => 10,
                'prevPageLabel' => 'Vorne',
                'nextPageLabel' => 'Nächste',
              ]
        ]);Pjax::end(); 
        
        ?>
    </div>

    <?php /*Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ModulID',
            'Bezeichnung',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl(['modul/view', 'id' => $model->ModulID, 'edit' => 't']),
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
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]); Pjax::end(); */?>

</div>
