<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use common\models\ModulLeitetProfessor;
use kartik\detail\DetailView;
use common\models\ModulLeitetProfessorSuchen;

/**
 * @var yii\web\View $this
 * @var common\models\Benutzer $model
 */

// Den ganzen Name von Benutzer in der Titelzeil zeigen
$this->title = $model->Vorname." ".$model->Nachname;
$this->params['breadcrumbs'][] = ['label' => 'Professor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutor-view">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

	<!-- Erste Stücke -->
	<div class="row">
	    <!-- Personliche Details -->
		<div class="col-md-4">
    		<div class="panel panel-danger">
        		<div class="panel-heading">
            		<h3 class="panel-title">Personliche Daten</h3>
        		</div>
        		<div class="panel-body">
        			<!-- Profiefoto -->
            		<div class="row">
            		 	<div class="col-md-1"></div>
            			<?php $imge = $model->Profiefoto?>
    					<?= Html::img($imge,['class'=>'img-circle','alt'=>'user image', 'height'=>'90', 'width'=>'90'])?>
            		</div>
            		
            		<!-- Leere Zeichnen -->
            		<div></br></div>
            		
            		<!-- Detailview -->
            		<div>
              			 <?= DetailView::widget([
                            'model' => $model,
                            'condensed' => false,
                            'hover' => true,
                            'mode' => Yii::$app->request->get('edit') == 't' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
                            /*'panel' => [
                                'heading' => $this->title,
                                'type' => DetailView::TYPE_INFO,
                            ],*/
                            'attributes' => [
                                'MarterikelNr',
                                [
                                    'label' => 'Benutzername',
                                    'value' => $model->marterikelNr->Benutzername,
                                ],
                                [
                                    'label' => 'Vorname',
                                    'value' => $model->marterikelNr->Vorname,
                                ],
                                [
                                    'label' => 'Nachname',
                                    'value' => $model->marterikelNr->Nachname,
                                ],
                                [
                                    'label' => 'Email',
                                    'value' => $model->marterikelNr->email,
                                ],
                                'Buero',
                            ],
                            'deleteOptions' => [
                                'url' => ['delete', 'id' => $model->MarterikelNr],
                            ],
                            'enableEditMode' => true,
                        ]) ?>
                    </div>
       		 	</div>
    		</div>
		</div>
		
		<!-- Teilnahme Deitails  -->
		<div class="col-md-8">
			<div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Alle leitende Übungsgruppe</h3>
                </div>
                <div class="panel-body">
                    <!-- Übungen -->	
                	<div class="col-md-12">
                	<div><h5>leitenden Übungsgruppe</h5></div>	
                	<!-- Leere Zeile -->
                	<div class="row"></br></div>
                		<div>
                			<table class="table table-condensed" >
                				<tr>
                					<th>#</th>
                					<th>Modul</th>
                				</tr>
                				<?php $i=1?>
                				<?php foreach (ModulLeitetProfessor::find()->where(['Professor_MarterikelNr'=>$model->MarterikelNr])->all() as $modul):?>
                				<tr>
                					<th><?php echo $i?></th>
                					<td><?php echo $modul->modul->Bezeichnung?></td>
                					<?php $i++?>
                				</tr>
                				<?php endforeach;?>
                			</table>
                		</div>
                	</div>
                </div>   
            </div>
		</div>	
		
	</div>
	
	<!-- Zeiwten Stück -->
	<div class="row">
		<div class="col-md-12">
    		<div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Alle leitende Modul</h3>
                </div>
                <!-- Body -->
                <div class="panel-body">
                  	  <div class="uebung">
                		  <!-- Leere Zeile -->
                		  <div><br></div>
                		  
                		  <!-- Listview für alle Übungsnote -->
                		  <div class="row">
                		      	<div class="col-md-12">
                		      		<div class="row">
                    		  			<?php $searchModelModulLeitetProfessor = new ModulLeitetProfessorSuchen;
                    		  			$dateProviderModulLeitetProfessor = $searchModelModulLeitetProfessor->searchAlleModul($model->MarterikelNr);
                    		  			?>
                    		  			<?php Pjax::begin(); echo ListView::widget([
                            			    'id' => 'benutzerlist',
                    		  			    'dataProvider' => $dateProviderModulLeitetProfessor,
                            			    'itemView' => '_modullistview',
                    		  			    //weitere Parameter
                            			    'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
                            			    'itemOptions' => [
                            			        'tag' => 'div',
                            			        'class' => 'col-md-3'
                            			    ],
                            			    //'layout' => '{items} {pager}',
                            			    'pager' => [
                            			        'maxButtonCount' => 30,
                            			        'nextPageLabel' => Yii::t('app', 'nächste'),
                            			        'prevPageLabel' => Yii::t('app', 'vorne'),
                            			    ],
                            			]); Pjax::end()?>
                		  			</div>
                		  		</div>
                		  </div>
                  	  </div>
                </div>
            </div>
        </div>
	</div>
	
</div>

