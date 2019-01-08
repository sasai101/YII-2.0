<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\UebungsblaetterSuchen $searchModel
 */

$this->title = 'Alle Übungsblätter';
$this->params['breadcrumbs'][] = ['label' => 'Übungsblätter hochladen', 'url' => ['uebung/alleuebungen']];
$this->params['breadcrumbs'][] = HtmlPurifier::process(mb_substr($modelUebung->modul->Bezeichnung, 0, 15).'......');
?>
<div class="uebungsblaetter-index">


	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Titel -->
	
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>	


	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
              <div class="panel-heading"><h3><?= Html::encode($modelUebung->modul->Bezeichnung) ?></h3></div>
              	<div class="panel-body">
              	
					<div class="row"></br></div>
					
              		
					<div class="row">
						<div class="col-md-12">
						<!-- Leere Zeile -->
                    	<div class="row"></br></div>
                    	<!-- Leere Zeile -->
                    	<div class="row"></br></div>	
							<?php Pjax::begin(); echo GridView::widget([
                                'dataProvider' => $dataProvider,
                                //'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                        
                                    //'UebungsblatterID',
                                    //'UebungsID',
                                    [
                                        'attribute' => 'UebungsID',
                                        'value' => 'uebungs.Bezeichnung',
                                    ],
                                    //'UebungsNr',
                                    [
                                        'attribute' => 'UebungsNr',
                                        'value' => function ($model) {
                                            return "Übungsbätter ".$model->UebungsNr;
                                        }
                                    ],
                                    'Anzahl_der_Aufgabe',
                                    'GesamtePunkte',
                                    //'Deadline',
                                    [
                                        'attribute' => 'Ausgabedatum',
                                        'format' => ['date', 'php:d-m-Y H:i:s']
                                    ],
                                    //'Ausgabedatum', 
                                    [
                                        'attribute'=> 'Deadline',
                                        'format' => ['date','php:d-m-Y H:i:s'],
                                    ],
                                    [
                                        'label'=>'Abgabenstatus',
                                        'format'=>'raw',
                                        'value'=>function ($model) {
                                            return Html::a('Status',['abgabestatus','id'=>$model->UebungsblatterID]);
                                        }
                                    ],
                                        
                                    
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'buttons' => [
                                            'update' => function ($url, $model) {
                                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                                                    Yii::$app->urlManager->createUrl(['uebungsblaetter/update', 'id' => $model->UebungsblatterID, 'edit' => 't']),
                                                    ['title' => Yii::t('yii', 'Edit')]
                                                );
                                            },
                                            'delete' => function ($url, $model) {
                                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->UebungsblatterID], [
                                                    'data' => [
                                                        'confirm' => 'Sind sicher, um die Model zu löschen?',
                                                        'method' => 'post',
                                                    ],
                                                   ]);
                                            },
                                            'view' => function ($url, $model) {
                                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                                                    Yii::$app->urlManager->createUrl(['uebungsblaetter/view', 'id' => $model->UebungsblatterID]),
                                                    ['title' => Yii::t('yii', 'Edit'), 'class'=>'modalButton']
                                                    );
                                            },
                                            
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
                                    // Add Funktion die ÜbungsID in der Create Funktion weiterführen,damit die erstellte Übungsblätte an richtiger Übung geht.
                                    'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Übungsblätter', ['create','id' => $modelUebung->UebungsID], ['class' => 'btn btn-success']),
                                    // Hier 'id' => $modelUebung->UebungsID erfullen ,sonst 404, Da kein ID gefunden
                                    'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index','id' => $modelUebung->UebungsID], ['class' => 'btn btn-info']),
                                    'showFooter' => false
                                    
                                ],
                            ]); Pjax::end(); ?>

						</div>
					</div>
					
					
                    <div class="row"></br></div>
				</div>
            </div>            
		</div>
	</div>

</div>
