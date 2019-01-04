<?php
use backend\assets\EchartsAsset;
use Hisune\EchartsPHP\ECharts;
use yii\widgets\Pjax;
use common\models\Uebungsgruppe;
use common\models\Uebung;


$this->title = $model->uebungs->mitarbeiterMarterikelNr->marterikelNr->Vorname." ".$model->uebungs->mitarbeiterMarterikelNr->marterikelNr->Nachname;
$this->params['breadcrumbs'][] = ['label' => 'Mitarbeiter', 'url' => ['mitarbeiter/index']];
$this->params['breadcrumbs'][] = ['label' => 'view', 'url' => ['mitarbeiter/view', 'id'=>$model->uebungs->Mitarbeiter_MarterikelNr]];
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
			<h3>Übungsgruppe <?php echo $model->GruppenNr?></h3>
			<h3>Tutor: <?php echo $model->tutorMarterikelNr->marterikelNr->Vorname." ".$model->tutorMarterikelNr->marterikelNr->Nachname?></h3>
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
                            'text' => 'Gesamte Punkte',
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
                                'data' => Uebung::AllerPersonGruppe($model->UebungsgruppeID),
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
                                'data' => Uebung::GesamtePunkteDerPersonInArray($model->UebungsgruppeID),
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
