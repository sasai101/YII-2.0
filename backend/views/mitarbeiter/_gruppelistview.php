<?php
use yii\helpers\Html;
use backend\assets\EchartsAsset;
use Hisune\EchartsPHP\ECharts;
use common\models\Uebung;
use yii\widgets\Pjax;
?>

<?php Pjax::begin()?>
<div class="uebungsnote">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    	<h4>Übungsgruppe<?php echo $model->GruppenNr?>
						&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo Html::a('<i class="fa fa-bar-chart"></i>',['uebungsgruppe/uebungsgruppebarecharts','uebungsgruppeID'=>$model->UebungsgruppeID])?></h4>
                    	
                    </h3>
                </div>
                <div class="panel-body">
                	<div class="row">
                      	<div class="col-md-12">
                      	<?php Pjax::begin();
                      		
                                $asset = EchartsAsset::register($this);
                                $chart = new ECharts($asset->baseUrl);
                                
                                $chart->title = array(
                                    'text' => 'Gruppestatus',
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
                                        'name' => 'Anzahl',
                                        'type' => 'pie',
                                        'radius' => '50%',
                                        
                                        'center' => array('50%', '55%'),
                                        //alle note mit AufgabeNr
                                        'data' => array(
                                            array('value'=>$model->Anzahl_der_Personen,'name'=>'Besitzt'),
                                            array('value'=>$model->Max_Person-$model->Anzahl_der_Personen,'name'=>'Frei'),
                                        ),
                                        
                                        'itemStyle' => array(
                                            'emphasis' => array(
                                                'shadowBlur'=>'50', 
                                            )
                                        ),
                                            
                                    )
                                );
                                $echartsID = "simple-custom-".$model->UebungsgruppeID;
                                echo $chart->render($echartsID);
                                Pjax::end()?>
                      	</div>
              		</div>
                
                    <!-- Anzahl der Zugelassener -->
        			<div>
        			    &nbsp Zugelassen: ( <b><?php echo Uebung::AnzahlderzugelassenPersonderGruppe($model->UebungsgruppeID)."/".$model->Anzahl_der_Personen?> )</b>
        			</div>
        			
        			<!-- Korrektor -->
        			<div>
        				&nbsp Tutor: <b><?php echo $model->tutorMarterikelNr->marterikelNr->Vorname." ".$model->tutorMarterikelNr->marterikelNr->Nachname?></b>
        			</div>
                </div>
            </div>
			
		</div>
	</div>
</div>
<?php Pjax::end()?>