<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use backend\assets\EchartsAsset;
use Hisune\EchartsPHP\ECharts;
use common\models\Abgabe;
/**
 * @var yii\web\View $this
 * @var common\models\Uebungsblaetter $model
 */

$this->params['breadcrumbs'][] = ['label' => 'Übungsblätter hochladen', 'url' => ['uebung/alleuebungen']];
$this->params['breadcrumbs'][] = ['label' => 'Uebungsblaetters', 'url' => ['index', 'id' => $model->UebungsID]];
$this->params['breadcrumbs'][] = 'Update';

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
              <div class="panel-heading"><h3><?= Html::encode($model->uebungs->modul->Bezeichnung) ?></h3></div>
              	<div class="panel-body">
              	
					<div class="row"></br>
						<div class="col-md-12">
							<h4><?= Html::encode($model->uebungs->Bezeichnung) ?></h4>
						</div>
					</div>
					
              		<!-- Leere Zeile -->
                	<div class="row"></br></div>
                	<!-- Leere Zeile -->
                	<div class="row"></br></div>
                    		
					<div class="row">
						<div class="col-md-6">
						
                              <div class="panel panel-default">
                                <div class="panel-heading">Notenstatus</div>
                                <div class="panel-body">
									<div class="col-md-12">
										<?php                   		
              		
                                        $asset = EchartsAsset::register($this);
                                        $chart = new ECharts($asset->baseUrl);
                                        
                                        $chart->title = array(
                                            'text' => 'Übungspunktverteilung',
                                            'subtext' => 'Anzahl der Studenten bei jeden Punkt',
                                        );
                                        
                                        $chart->tooltip = array(
                                            'trigger' => 'axis',
                                            'axisPointer' =>array(
                                                'type' => 'cross',
                                                'crossStyle' => array(
                                                    'color' => '#999',
                                                ),
                                            ),
                                        );
                                        
                                        $chart->legend->data = array(
                                            'Anzahl der Studenten'
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
                                        
                                        $chart->xAxis = array(
                                            array(
                                                'type' => 'category',
                                                'data' => Abgabe::AllePunkteZahl($model->UebungsblatterID),
                                                'axisPointer' => array(
                                                    'type' => 'shadow'
                                                )
                                            )
                                        );
                                        $chart->yAxis = array(
                                            array(
                                                'type' => 'value',
                                            )
                                        );
                                        $chart->series = array(
                                            
                                            array(
                                                'name' => 'Anzahl der Studenten',
                                                'type' => 'bar',
                                                'data' => Abgabe::AnzahlderPrersonMitPunkt($model->UebungsblatterID),   
                                            )
                                        );
                                        echo $chart->render('simple-custom-1');?>
									</div>
								</div>
                              </div>

						</div>
						
						<div class="col-md-6">
						
                              <div class="panel panel-default">
                                <div class="panel-heading">Abgabestatus</div>
                                <div class="panel-body">
									<div class="col-md-12">
										<?php
                      		
                                            $asset = EchartsAsset::register($this);
                                            $chart = new ECharts($asset->baseUrl);
                                            
                                            $chart->title = array(
                                                'text' => 'Abgabestatus',
                                                'subtext' => 'Proportionalität',
                                                'x' => 'center'
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
                                            
                                            $chart->legend = array(
                                                'orient'=>'vertical',
                                                'left' => 'left',
                                                'data' => array('Nicht abgegeben', 'Abgegeben')
                                            );
                                            
                                            $chart->series = array(
                                                array(
                                                    'name' => ' ',
                                                    'type' => 'pie',
                                                    'radius' => '60%',
                                                    'center' => array('50%', '55%'),
                                                    //alle note mit AufgabeNr
                                                    'data' => array(
                                                        array('value'=>Abgabe::AlleAnzahlNichtAbgeben($model->UebungsblatterID), 'name'=>'Nicht abgegeben'),
                                                        array('value'=>Abgabe::AlleAnzahlAbgeben($model->UebungsblatterID), 'name'=>'Abgegeben'),
                                                    ),
                                                    
                                                    'itemStyle' => array(
                                                        'emphasis' => array(
                                                            'shadowBlur'=>'50', 
                                                        )
                                                    ),
                                                        
                                                )
                                            );
                                            echo $chart->render('simple-custom-2');?>
									</div>
								</div>
                              </div>

						</div>
						
					</div>
					
                    <div class="row"></br></div>
				</div>
            </div>            
		</div>
	</div>

</div>