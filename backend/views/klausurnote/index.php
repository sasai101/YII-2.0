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

//$this->title = 'Modul '.$modelModul->Bezeichnung;
$this->params['breadcrumbs'][] = ['label' => 'Alle Modul', 'url' => ['klausurnote/klausurnotelistview']];
$this->params['breadcrumbs'][] = HtmlPurifier::process(mb_substr($modelKlausur->Bezeichnung, 0, 15).'......');
?>
<div class="klausurnote-index">

	
    <div class="row"></br></div>
	<div class="panel panel-default">
      	<div class="panel-body">
 			<!-- Leere Zeile -->
        	<div class="row"></br></div>
        	<!-- Leere Zeile -->
        	<div class="row"></br></div>
        	
        	<!-- Titel -->
        	<div>
        		<h3>
        			<?php echo $modelKlausur->Bezeichnung?> :</br></br>
        			<?= Html::encode($modelKlausur->modul->Bezeichnung); ?></br></br>
        			
                    <?php echo Html::a('<i class="glyphicon glyphicon-paperclip"></i> Klausurnoten', ['klausur/echartsbarklausur', 'id'=>$modelKlausur->KlausurID], ['class' => 'btn btn-success']); ?>
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
                    'Benutzer_MarterikelNr',
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
                    'KlausurID',
                    [
                        'attribute'=>'KlausurID',
                        'label'=>'Klausur',
                        'value'=>'klausur.Bezeichnung',
                    ],
        
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
                                    ['title' => Yii::t('yii', 'Edit'),'class'=>'modalButton']
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
                    //Modal
                    'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create', 'id'=>$modelKlausur->KlausurID], ['class' => 'btn btn-success modalButton']),
                    'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index', 'id'=>$modelKlausur->KlausurID], ['class' => 'btn btn-info']),
                    'showFooter' => false
                ],
            ]); Pjax::end();?>
		</div>
    </div>
</div>
