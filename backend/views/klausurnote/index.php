<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\KlausurnoteSuchen $searchModel
 */

$this->title = 'Modul '.$modelModul->Bezeichnung;
$this->params['breadcrumbs'][] = ['label' => 'Alle Modul', 'url' => ['klausur/klausurnotelistview']];
$this->params['breadcrumbs'][] = HtmlPurifier::process(mb_substr($modelModul->Bezeichnung, 0, 15).'......');
?>
<div class="klausurnote-index">

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
        <?php /* echo Html::a('Create Klausurnote', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'KlausurnoteID',
            //'Mitarbeiter_MarterikelNr',
            
            [
                'attribute'=>'Bezeichnung',
                'contentOptions'=>['width'=>'130px']
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
            [
                'attribute'=>'KorregierteZeit',
                'format'=>['date','php:d-m-Y H:i:s'],
            ],
            //'ModulID', 
            //Korrektor
            [
                'attribute'=>'Mitarbeiter_MarterikelNr',
                'value'=>function ($model){
                    return $model->mitarbeiterMarterikelNr->Vorname." ".$model->mitarbeiterMarterikelNr->Nachname;
                }
            ],
           

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update}{delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl(['klausurnote/update', 'id' => $model->KlausurnoteID, 'edit' => 't']),
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
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success', 'id'=>$modelModul->ModulID]),
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index', 'id'=>$modelModul->ModulID], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]); Pjax::end(); ?>

</div>
