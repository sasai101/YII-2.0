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
        <?php /* echo Html::a('Create Modul', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>
    
    <?php Pjax::begin(); echo ListView::widget([
          'dataProvider' => $dataProvider,//数据提供器
          'itemView' => '_modulListviewItem',//指定item视图（该视图文件与当前视图在同一个目录下)
          'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',//整个ListView布局
          'itemOptions' => [//针对渲染的单个item
            'tag' => 'div',
            'class' => 'col-lg-3'
          ],
          /*
          'options' => [//针对整个ListView
            'tag' => 'div',
            'class' => 'col-lg-3'
          ],
          */
          'pager' => [
            //'options' => ['class' => 'hidden'],//关闭分页（默认开启）
            /* 分页按钮设置 */
            'maxButtonCount' => 5,//最多显示几个分页按钮
            'firstPageLabel' => '首页',
            'prevPageLabel' => '上一页',
            'nextPageLabel' => '下一页',
            'lastPageLabel' => '尾页'
          ]
    ]);Pjax::end(); 
    
    ?>

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
