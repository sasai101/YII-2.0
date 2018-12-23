<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\HtmlPurifier;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\KlausurSuchen $searchModel
 */

$this->title = $modelModul->Bezeichnung;
$this->params['breadcrumbs'][] = ['label' => 'Alle Modul', 'url' => ['klausurlistview', 'id'=>$modelModul->ModulID]];
$this->params['breadcrumbs'][] = HtmlPurifier::process(mb_substr($modelModul->Bezeichnung, 0, 15).'......');
?>
<div class="klausur-index">

    <!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Titel -->
	<div>
		<h3>
			<?= Html::encode($modelModul->Bezeichnung); ?>
		</h3>
	</div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>	
	
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Klausur', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'KlausurID',
           // 'Mitarbeiter_MarterikelNr',
            [
                'attribute'=>'Mitarbeiter_MarterikelNr',
                'contentOptions'=>['width'=>'130px']
            ],
            [
                'attribute' => 'mitarbeiterMarterikelNr',
                'label' => 'Mitarbeitername',
                'value' => function ($model) {
                    return $model->mitarbeiterMarterikelNr->vorname." ".$model->mitarbeiterMarterikelNr->nachname;
                }
            ],
            
            
//            'ModulID',
            'Kreditpunkt',
            //'Pruefungsdatum',
            [
                'attribute' => 'Pruefungsdatum',
                'format'=>['date','php:d-m-Y H:i:s'],
            ],
            'Raum', 
            'Bezeichnung', 
 

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl(['klausur/update', 'id' => $model->KlausurID, 'edit' => 't']),
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
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create','id'=>$modelModul->ModulID], ['class' => 'btn btn-success' ]),
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index','id'=>$modelModul->ModulID], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]); Pjax::end(); ?>

</div>
