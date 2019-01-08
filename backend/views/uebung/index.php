<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use common\models\Uebungsgruppe;
use common\models\Uebung;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\UebungSuchen $searchModel
 */

$this->title = 'Uebungs';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="modul-index">

	
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
              <div class="panel-heading"><h3>Übungsblätter hochladen</h3></div>
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
                        
                                    //'UebungsID',
                                    //'ModulID',
                                    
                                    'Mitarbeiter_MarterikelNr',
                                    [
                                        'label' => 'Mitarbeiter',
                                        'value' => function($model) {
                                        return $model->getBenutzerNname($model->Mitarbeiter_MarterikelNr);
                                        }
                                    ],
                                    'Bezeichnung',
                                    //'Zulassungsgrenze',
                                    [
                                        'attribute'=>'Zulassungsgrenze',
                                        'value'=>function ($model) {
                                            return $model->Zulassungsgrenze."%";
                                        }
                                    ],
                                    // gestamte Anzahl der Teilnahmer
                                    [
                                        'label'=>'Anzahl der Teilnahmer',
                                        'value'=>function ($model) {
                                        return Uebung::AnzahlAllePersonUebung($model->UebungsID);
                                        }
                                        ],
                                    [
                                        'label'=>'Gruppenanzahl',
                                        'value'=>function ($model) {
                                            return Uebungsgruppe::find()->where(['UebungsID'=>$model->UebungsID])->count();
                                        }
                                    ],
                                    
                                    [
                                        'label' => 'Modul',
                                        'value' => function ($model) {
                                            return $model->modul->Bezeichnung;
                                        }
                                    ],
                                    
                        
                                    [ 
                                        'class' => 'yii\grid\ActionColumn', 
                                        'template'=>'{update}',
                                        'buttons' => [ 
                                            'update' => function ($url, $model) { 
                                                return Html::a('<span class="glyphicon glyphicon-open-file"></span>', 
                                                    Yii::$app->urlManager->createUrl(['uebungsblaetter/index', 'id' => $model->UebungsID, 'edit' => 't']), 
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
                                    'showFooter' => false 
                                ], 
                            ]);  ?> 

						</div>
					</div>
					
					
                    <div class="row"></br></div>
                    
                    <div class="row">
              			<div class="col-md-3">
              				<p>
                                <?php echo Html::a('Listview Form', ['alleuebungen'], ['class' => 'btn btn-success'])  ?>
                            </p>
              			</div>
              		</div>
            
				</div>
            </div>            
		</div>
	</div>
</div>
