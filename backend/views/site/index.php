<?php
use backend\assets\EchartsAsset;
use Hisune\EchartsPHP\ECharts;
use yii\widgets\Pjax;
use common\models\AnzahlDesBenutzers;
use common\models\Mitarbeiter;
use common\models\Professor;
use common\models\Tutor;
use common\models\Korrektor;
use common\models\Benutzer;

?>
<div>
	<div></br></br></br></br></div>
    <div class="row">
    	<div class="col-md-12">
			<div class="col-md-6">
				<div class="panel panel-success">
                  <div class="panel-heading">Alle Benutzer</div>
                  <div class="panel-body">
                  	<div class="row">
                      	<div class="col-md-12">
                      		<?php Pjax::begin();
                      		
                                $asset = EchartsAsset::register($this);
                                $chart = new ECharts($asset->baseUrl);
                                
                                $chart->title = array(
                                    'text' => 'Anzahel des registriert Benutzers',
                                    'subtext' => 'für jede Zeitpunkt',
                                );
                                
                                $chart->tooltip = array(
                                    'trigger' => 'axis',
                                );
                                
                                $chart->legend->data = array(
                                    'Anzahl'
                                );
                                
                                $chart->xAxis = array(
                                    array(
                                        'type' => 'category',
                                        'boundaryGap' => false,
                                        'data' => AnzahlDesBenutzers::ZeitInArray(),
                                    )
                                );
                                $chart->yAxis = array(
                                    array(
                                        'type' => 'value'
                                    )
                                );
                                $chart->series = array(
                                    array(
                                        'name' => 'Anzahl des Benutzers',
                                        'type' => 'line',
                                        'stack' => 'Gsamte',
                                        'areaStyle' => array(),
                                        'data' => AnzahlDesBenutzers::AnzahlInArray(),   
                                    )
                                );
                                echo $chart->render('simple-custom-1');
                                Pjax::end()?>
                      	 </div>
                      </div>
				  </div>
                </div>
			</div>
			
			<div class="col-md-6">
				<div class="panel panel-info">
                  <div class="panel-heading">Anteil der Benutzer</div>
                  <div class="panel-body">
                  	<div class="row">
                      	<div class="col-md-12">
                      	<?php Pjax::begin();
                      		
                                $asset = EchartsAsset::register($this);
                                $chart = new ECharts($asset->baseUrl);
                                
                                $chart->title = array(
                                    'text' => 'Anteil der Benutzer',
                                    'subtext' => 'für jeweilige Rolle',
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
                                    'orient' => 'vertical',
                                    'left' => 'left',
                                    'data' => array(
                                    'Mitarbeiter','Professor','Tutor','Korrektur','Normale Benutzer'
                                    ) 
                                );
                                
                                $chart->series = array(
                                    array(
                                        'name' => 'Punkte',
                                        'type' => 'pie',
                                        'radius' => '80%',
                                        
                                        'center' => array('50%', '57%'),
                                        'data' => array(
                                            array('value'=>Mitarbeiter::find()->count(), 'name'=>'Mitarbeiter'),
                                            array('value'=>Professor::find()->count(), 'name'=>'Professor'),
                                            array('value'=>Tutor::find()->count(), 'name'=>'Tutor'),
                                            array('value'=>Korrektor::find()->count(), 'name'=>'Korrektur'),
                                            array('value'=>Benutzer::AnzahlderNormalBenuter(),'name'=>'Normale Benutzer'),
                                         ),
                                        'itemStyle' => array(
                                            'emphasis' => array(
                                                'shadowBlur'=>'50', 
                                            )
                                        ),
                                            
                                    )
                                );
                                echo $chart->render('simple-custom-2');
                                Pjax::end()?>
                      	</div>
                      </div>
                  </div>
                </div>
			</div>
		</div>
    	
    </div>
</div>
