<?php
use backend\assets\EchartsAsset;
use Hisune\EchartsPHP\ECharts;
use yii\widgets\Pjax;
use FailDependenciesPrimitiveParam\AnotherClass;
use common\models\Uebungsgruppe;
use common\models\Uebung;
use common\models\Klausur;
use common\models\Klausurnote;


$this->title = $model->mitarbeiterMarterikelNr->marterikelNr->Vorname." ".$model->mitarbeiterMarterikelNr->marterikelNr->Nachname;
$this->params['breadcrumbs'][] = ['label' => 'Mitarbeiter', 'url' => ['mitarbeiter/index']];
$this->params['breadcrumbs'][] = ['label' => 'view', 'url' => ['mitarbeiter/view', 'id'=>$model->Mitarbeiter_MarterikelNr]];
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
			<h3><?php echo $model->Bezeichnung?></h3>
			<h3><?php echo $model->modul->Bezeichnung?></h3>
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
                  		
              		
                        $asset = EchartsAsset::register($this);
                        $chart = new ECharts($asset->baseUrl);
                        
                        $chart->title = array(
                            'text' => 'Klausurnotenstatus',
                            'subtext' => 'Anzahl der Studenten bei jeden Note',
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
                                'data' => Klausurnote::NoteInArray(),
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
                                'data' => Klausurnote::AnzahlDerPersonMitNotInArray($model->KlausurID),   
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
