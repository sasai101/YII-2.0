<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\detail\DetailView;
use common\models\Korrektor;
use backend\assets\EchartsAsset;
use Hisune\EchartsPHP\ECharts;

/**
 * @var yii\web\View $this
 * @var common\models\Benutzer $model
 */

// Den ganzen Name von Benutzer in der Titelzeil zeigen
$this->title = $model->Vorname." ".$model->Nachname;
$this->params['breadcrumbs'][] = ['label' => 'Korrektor', 'url' => ['index']];
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
                                    'label' => 'Voranme',
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
                    <h3 class="panel-title">Korrigierte Abgabe der jeweiligen Übung</h3>
                </div>
                <div class="panel-body">
                    <!-- Übungen -->	
                	<div class="col-md-12">
                	<div><h5></h5></div>	
                	<!-- Leere Zeile -->
                	<div class="row"></br></div>
                		<div>
                			<table class="table table-condensed" >
                				<tr>
                					<th>#</th>
                					<th>Modul</th>                					
                					<th>Anzahl der korregierten Abgabe</th>
                				</tr>
                				<!--  <pre><?php //print_r(Korrektor::AnzahlKorrigierteUebung($model->MarterikelNr)) ?></pre> -->
                				<?php $i=1?>
                				<?php foreach (Korrektor::AnzahlKorrigierteUebung($model->MarterikelNr) as $key=>$anzahl):?>
                				<tr>
                					<th><?php echo $i?></th>
                					<th><?php echo $key?></th>
                					<td><?php echo $anzahl?></td>
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
                    		  			<!--  <pre><?php //print_r(Korrektor::KorregierteZeitInArray($model->MarterikelNr)) ?></pre>
                    		  			<pre><?php //print_r(Korrektor::DatumArray($model->MarterikelNr)) ?></pre>
                    		  			<pre><?php //print_r(Korrektor::AnzahlArray($model->MarterikelNr)) ?></pre>-->
                    		  			<div class="col-md-6">
                    		  			<?php Pjax::begin();
                                  		
                                            $asset = EchartsAsset::register($this);
                                            $chart = new ECharts($asset->baseUrl);
                                            
                                            $chart->title = array(
                                                'text' => 'Anzahl der korrigierten Abgabe',
                                                'subtext' => 'beim bestemmenten Dautm',
                                            );
                                            
                                            $chart->tooltip = array(
                                                'trigger' => 'axis',
                                            );
                                            
                                            $chart->legend->data = array(
                                                'Anzahl der korregierten Abgabe'
                                            );
                                            
                                            $chart->toolbox = array(
                                                'show'=>true,
                                                'feature'=> array(
                                                    'mark' => array(
                                                        'show'=>true,
                                                    ),
                                                    'dataView'=>array(
                                                        'show'=>true,
                                                        'readOnly'=>false,
                                                    ),
                                                    'magicType'=>array(
                                                        'show'=>true,
                                                        'type'=>array('line','bar'),
                                                    ),
                                                    'restore'=>array(
                                                        'show'=>true,
                                                    ),
                                                    'saveAslmage'=>array(
                                                        'show'=>true,
                                                    ),
                                                ),
                                            );
                                            
                                            $chart->calculable = true;
                                            
                                            $chart->xAxis = array(
                                                array(
                                                    'type' => 'category',
                                                    'data' => Korrektor::DatumArray($model->MarterikelNr),
                                                    'axisPointer' => array(
                                                        'type' => 'shadow'
                                                    )
                                                )
                                            );
                                            $chart->yAxis = array(
                                                array(
                                                    'type' => 'value'
                                                )
                                            );
                                            $chart->series = array(
                                                array(
                                                    'name' => 'Anzahl',
                                                    'type' => 'bar',
                                                    'data' => Korrektor::AnzahlArray($model->MarterikelNr),
                                                    'markPoint' => array(
                                                        'data' => array(
                                                            array('type' => 'max', 'name'=>'Max'),
                                                            array('type' => 'min', 'name'=>'Min')
                                                        ) 
                                                    )   
                                                )
                                            );
                                            echo $chart->render('simple-custom-id');
                                            Pjax::end()?>
                                         </div>
                                         
                                         <!-- Anteil -->
                                         <div class="col-md-6">
                                        <!-- <pre><?php //print_r(Korrektor::PieArrray($model->MarterikelNr)) ?></pre> --> 
                                         <?php Pjax::begin();
                      		
                                            $asset = EchartsAsset::register($this);
                                            $chart = new ECharts($asset->baseUrl);
                                            
                                            $chart->title = array(
                                                'text' => 'Korregiertes Status',
                                                'subtext' => 'Proportionalität',
                                                'x' => 'left'
                                            );
                                            
                                            $chart->tooltip = array(
                                                'trigger' => 'item',
                                                'formatter' => "{a} <br/>{b} : {c} ({d}%)"
                                            );
                                            
                                            $chart->toolbox = array(
                                                'show'=>true,
                                                'feature'=> array(
                                                    'mark' => array(
                                                        'show'=>true,
                                                    ),
                                                    'dataView'=>array(
                                                        'show'=>true,
                                                        'readOnly'=>false,
                                                    ),
                                                    'restore'=>array(
                                                        'show'=>true,
                                                    ),
                                                    'saveAslmage'=>array(
                                                        'show'=>true,
                                                    ),
                                                ),
                                            );
                                            
                                            $chart->series = array(
                                                array(
                                                    'name' => ' ',
                                                    'type' => 'pie',
                                                    'radius' => '66%',
                                                    
                                                    'center' => array('50%', '55%'),
                                                    //alle note mit AufgabeNr
                                                    'data' => Korrektor::PieArrray($model->MarterikelNr),
                                                    
                                                    'itemStyle' => array(
                                                        'emphasis' => array(
                                                            'shadowBlur'=>'50', 
                                                        )
                                                    ),
                                                        
                                                )
                                            );
                                            echo $chart->render('simple-custom-id1');
                                            Pjax::end()?>
                                         </div>
                		  			</div>
                		  		</div>
                		  </div>
                  	  </div>
                </div>
            </div>
        </div>
	</div>
	
</div>

