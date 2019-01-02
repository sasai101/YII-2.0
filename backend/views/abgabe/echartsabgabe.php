<?php
use backend\assets\EchartsAsset;
use Hisune\EchartsPHP\ECharts;
use yii\widgets\Pjax;


$this->title = $modelBenutzer->Vorname." ".$modelBenutzer->Nachname;
$this->params['breadcrumbs'][] = ['label' => 'Benutzers', 'url' => ['benutzer/index']];
$this->params['breadcrumbs'][] = ['label' => 'view', 'url' => ['benutzer/view', 'id'=>$modelBenutzer->MarterikelNr]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <!-- Leere Zeile -->
	<div class="row">
	</br>
	</br></br></br></br></br></br>
	</div>
	
	<div class="col-md-12">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h3><?php echo $modelUebung->Bezeichnung?></h3>
			<h4><?php echo $modelBenutzer->Vorname." ".$modelBenutzer->Nachname?>
		</div>
		<div class="col-md-2"></div>
	</div>
	
	<div class="row">
	</br>
	</br></br></br></br>
	</div>
	
	<div class="col-md-12">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel panel-default">
              <div class="panel-heading">Alle Noten der Übung <?php ?></div>
              <div class="panel-body">
              <div class="row">
              	<div class="col-md-12">
              		<?php Pjax::begin();
                  		$notearry = array();
                  		$aufgabe = array();
                  		$i = 1;
                  		foreach ($model as $einzeln) {
                  		    array_push($notearry,$einzeln->GesamtePunkt);
                  		    array_push($aufgabe, "Blatt ".$i);
                  		    $i++;
                  		}
              		
                        $asset = EchartsAsset::register($this);
                        $chart = new ECharts($asset->baseUrl);
                        
                        $chart->title = array(
                            'text' => 'Übungsnote',
                            'subtext' => 'für jeden Blatt',
                        );
                        
                        $chart->tooltip = array(
                            'trigger' => 'axis',
                        );
                        
                        $chart->legend->data = array(
                            'Punkte'
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
                                'data' => $aufgabe,
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
                                'name' => 'Punkte',
                                'type' => 'bar',
                                'data' => $notearry,
                                'markPoint' => array(
                                    'data' => array(
                                        array('type' => 'max', 'name'=>'Max'),
                                        array('type' => 'min', 'name'=>'Min')
                                    ) 
                                ),
                                'markLine' => array(
                                    'data' => array(
                                        array('type'=>'average', 'name'=>'xx')
                                        )
                                ),
                                    
                            )
                        );
                        echo $chart->render('simple-custom-id');
                        Pjax::end()?>
              	</div>
              </div>
              </div>
            </div>
		</div>
		<div class="col-md-2"></div>
	</div>
	
</div>
