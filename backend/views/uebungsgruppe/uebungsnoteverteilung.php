<?php
use backend\assets\EchartsAsset;
use Hisune\EchartsPHP\ECharts;
use yii\widgets\Pjax;
use common\models\Abgabe;

$this->title = 'Punktverteilung ';
$this->params['breadcrumbs'][] = ['label' => 'Alle Übungen', 'url' => ['uebung/alleuebungsgruppe']];
$this->params['breadcrumbs'][] = ['label' => 'Alle Übungsgruppen', 'url' => ['uebungsgruppe/alleuebungsgruppe','id'=>$model->UebungsID]];
$this->params['breadcrumbs'][] = 'Übung '.$model->Bezeichnung;
?>

<div class="row">
	<div></br></div>
	<div class="panel panel-default">
        <div class="panel-body">
        	
        	<!-- Leere Zeile -->
        	<div class="row">
        	</br>
        	</br></br>
        	</div>
        	
        	<div class="col-md-12">
        		<div class="col-md-2"></div>
        		<div class="col-md-8">
        			<h3>Übung: <?php echo $model->Bezeichnung?></h3>
        			<h3>Leiter: <?php echo $model->mitarbeiterMarterikelNr->marterikelNr->Vorname." ".$model->mitarbeiterMarterikelNr->marterikelNr->Nachname?></h3>
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
                      <div class="panel-heading">Gesamte Punkte der jeweiligen Studenten  <?php ?></div>
                      <div class="panel-body">
                      <div class="row">
                      	<div class="col-md-12">
                      		<?php Pjax::begin();
                          		
                      		
                                $asset = EchartsAsset::register($this);
                                $chart = new ECharts($asset->baseUrl);
                                
                                $chart->title = array(
                                    'text' => 'Gesamte Punktverteilung',
                                    'subtext' => 'der jeweilige Studente',
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
                                    'Punktezahl'
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
                                        'data' => Abgabe::PunktzahlUebung($model->UebungsID),
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
                                        'name' => 'Punktezahl',
                                        'type' => 'bar',
                                        'data' => Abgabe::AnzahlPersonUebung($model->UebungsID),
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
  	</div>
    
</div>
