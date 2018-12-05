<?php

/* @var $this yii\web\View */

use kartik\tabs\TabsX;
use yii\widgets\Pjax;
use common\models\BenutzerSuchen;

$searchModel = new BenutzerSuchen;
$dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
?>
<?php Pjax::begin(); echo TabsX::widget([
    'position'=>TabsX::POS_ABOVE,
    'encodeLabels'=>false,
    'bordered'=>true,
    //'encodeLabels'=>false,
    'items' => [
        [
            'label'=>'<span class="glyphicon glyphicon-home"></span> Home',
            'content' => $this->render('..\benutzer\index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]),
            'active'=>true
        ],
        [
            'label'=>'<span class="glyphicon glyphicon-user"></span> Benutzer',
            'content' => $this->render('..\benutzer\listview',[
                //'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]),
            //'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/site/tabs-data'])]
        ],
        [
            'label'=>'<i class="fas fa-list-alt"></i> Menu',
            'items'=>[
                [
                    'label'=>'Option 1',
                    'encode'=>false,
                    'content'=>"one",
                ],
                [
                    'label'=>'Option 2',
                    'encode'=>false,
                    'content'=>"one",
                ],
            ],
        ],
        [
            'label'=>'<i class="fas fa-king"></i> Disabled',
            //'linkOptions' => ['class'=>'disabled']
        ],
    ],
]);Pjax::end(); ?>

</div>
