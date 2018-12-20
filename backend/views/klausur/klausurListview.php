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
               
                'maxButtonCount' => 20,
                'prevPageLabel' => 'Vorne',
                'nextPageLabel' => 'Nächste',
              ]
        ]);Pjax::end(); 
        
        ?>
    </div>

</div>
