<?php
use yii\helpers\Html;
use backend\assets\EchartsAsset;
use Hisune\EchartsPHP\ECharts;
use common\models\Uebung;
use yii\widgets\Pjax;
use common\models\Abgabe;
?>
<div class="uebungsnote">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    	<h4><?= Html::a("Übungsblatt: ".$model->UebungsNr, ['abgabe/index', 'UebungsgruppeID'=>$ubungsgruppe->UebungsgruppeID,'UebungsblaetterID'=>$model->UebungsblatterID]) ?>
						&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo Html::a('<i class="fa fa-bar-chart"></i>',['uebungsgruppe/uebungsgruppepiebarecharts','uebungsblaetterID'=>$model->UebungsblatterID,'uebungsgruppeID'=>$ubungsgruppe->UebungsgruppeID])?></h4>
                    	
                    </h3>
                </div>
                <div class="panel-body">
                	<div class="row">
                      	<div class="col-md-12">
                      	<?php Pjax::begin();
                      		
                                $asset = EchartsAsset::register($this);
                                $chart = new ECharts($asset->baseUrl);
                                
                                $chart->title = array(
                                    'text' => 'Abgabestatus',
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
                                        'radius' => '50%',
                                        
                                        'center' => array('50%', '55%'),
                                        //alle note mit AufgabeNr
                                        'data' => array(
                                            array('value'=>Abgabe::AnzahlWerNichtAbgeben($model->UebungsblatterID, $ubungsgruppe->UebungsgruppeID), 'name'=>'Nicht abgegaben'),
                                            array('value'=>Abgabe::AnzahlWerAbgeben($model->UebungsblatterID, $ubungsgruppe->UebungsgruppeID), 'name'=>'abgegaben'),
                                        ),
                                        
                                        'itemStyle' => array(
                                            'emphasis' => array(
                                                'shadowBlur'=>'50', 
                                            )
                                        ),
                                            
                                    )
                                );
                                $echartsID = "simple-custom-".$model->UebungsblatterID;
                                echo $chart->render($echartsID);
                                Pjax::end()?>
                      	</div>
              		</div>

                </div>
            </div>
			
		</div>
	</div>
</div>