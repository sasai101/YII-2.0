<?php
use yii\widgets\Pjax;
use common\models\Abgabe;
use backend\assets\EchartsAsset;
use Hisune\EchartsPHP\ECharts;
?>

<div class="uebungsnote">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    	Name: <?php echo $model->benutzerMarterikelNr->Vorname." ".$model->benutzerMarterikelNr->Vorname?>
                    </h3>
                </div>
                <div class="panel-body" >
					
        			
        			<div class="row">
                      	<div class="col-md-12">
                      	<?php 
                      		
                                $asset = EchartsAsset::register($this);
                                $chart = new ECharts($asset->baseUrl);
                                
                                $chart->title = array(
                                    'text' => 'Aufgabenote',
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
                                        'name' => 'Punkte',
                                        'type' => 'pie',
                                        'radius' => '50%',
                                        
                                        'center' => array('50%', '55%'),
                                        //alle note mit AufgabeNr
                                        'data' => Abgabe::ArrayEchertsPieForm($model->AbgabeID),
                                        
                                        'itemStyle' => array(
                                            'emphasis' => array(
                                                'shadowBlur'=>'50', 
                                            )
                                        ),
                                            
                                    )
                                );
                                $echartsID = "simple-custom-".$model->AbgabeID;
                                echo $chart->render($echartsID);
                                ?>
                      	</div>
              		</div>
        			
        			
        			<!-- Gesamte Punkte -->
        			<div>
        				&nbsp Gesamte Punkte: <b><?php echo $model->GesamtePunkt?></b>
        			</div>
        			
        			<!-- Korrektor -->
        			<div>
        				&nbsp Korrektor: <b><?php if($model->korrektorMarterikelNr==NUll){
                            				    echo "";
                            				}else{
                            				    echo $model->korrektorMarterikelNr->vorname." ".$model->korrektorMarterikelNr->nachname;
                            				}?></b>
                            				
        			</div>
        			<!--<pre><?php //print_r(Abgabe::ArrayEchertsPieForm($model->AbgabeID)) ?></pre>  -->
                </div>
            </div>
			
		</div>
	</div>
</div>