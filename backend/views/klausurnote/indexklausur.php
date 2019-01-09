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

$this->title = 'Alle Klausur';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="klausur-index">

	
	
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
              <div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
              	<div class="panel-body">
              	
					<div class="row"></br></div>
					
              		
					<div class="row">
						<div class="col-md-12">
						<!-- Leere Zeile -->
                    	<div class="row"></br></div>
                    	<!-- Leere Zeile -->
                    	<div class="row"></br></div>	
							<?php echo GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                        
                                    //'KlausurID',
                                   // 'Mitarbeiter_MarterikelNr',
                                    [
                                        'attribute'=>'modulBezeichnung',
                                        'label'=>'Modul',
                                        'value'=>function ($modul) {
                                        return $modul->modul->Bezeichnung;
                                        }
                                    ],
                                    //'Bezeichnung',
                                    [
                                        'attribute'=>'Bezeichnung',
                                        'format'=>'raw',
                                        'value'=>function ($model) {
                                            return Html::a($model->Bezeichnung,['klausurnote/index','id'=>$model->KlausurID]);
                                        }
                                    ],
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
                                    
                                    
                                    
                                    
                                    //'Pruefungsdatum',
                                    [
                                        'attribute' => 'Pruefungsdatum',
                                        'format'=>['date','php:d-m-Y H:i:s'],
                                    ],
                                    'Raum', 
                                     
                         
                        
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'template'=>'{view}',
                                        'buttons' => [
                                            'view' => function ($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                                                Yii::$app->urlManager->createUrl(['klausur/echartsbarklausur', 'id' => $model->KlausurID]),
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
                                    //'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Neue Klausurerstellen', ['create','id'=>$modelModul->ModulID], ['class' => 'btn btn-success' ]),
                                    //'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index','id'=>$modelModul->ModulID], ['class' => 'btn btn-info']),
                                    'showFooter' => false
                                ],
                            ]); ?>
						</div>
					</div>
					
					
                    <div class="row"></br></div>
                    
                    <div class="row">
                		<div class="col-md-3">
                			<p>
                                <?php echo Html::a('Listview Form', ['klausuranmeldunglistview'], ['class' => 'btn btn-success'])  ?>
                            </p>
                		</div>
                	</div>
            
				</div>
            </div>            
		</div>
	</div>
</div>
