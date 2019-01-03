<?php
use backend\assets\EchartsAsset;
use Hisune\EchartsPHP\ECharts;
use yii\widgets\Pjax;
use FailDependenciesPrimitiveParam\AnotherClass;
use common\models\Uebungsgruppe;
use common\models\Uebung;


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
                            'text' => 'Zulassungsstatus',
                            'subtext' => 'für jeden Gruppe',
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
                            'Zugelassen','Nicht zugelassen'
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
                                'data' => Uebungsgruppe::AlleUebungsgruppeArray($model->UebungsID),
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
                                'name' => 'Zugelassen',
                                'type' => 'bar',
                                'data' => Uebung::AnzahlderzugelassenenPersonArray($model->UebungsID),   
                            ),
                            array(
                                'name' => 'Nicht zugelassen',
                                'type' => 'bar',
                                'data' => Uebung::AnzahldernichtzugelassenenPersonArray($model->UebungsID),
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
