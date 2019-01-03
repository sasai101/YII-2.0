<?php
use backend\assets\EchartsAsset;
use Hisune\EchartsPHP\ECharts;
use yii\widgets\Pjax;
use common\models\Klausurnote;


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
			<h3><?php echo $modelKlausurnote->klausur->modul->Bezeichnung." : ".$modelKlausurnote->klausur->Bezeichnung?></h3>
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
              		
                        $asset = EchartsAsset::register($this);
                        $chart = new ECharts($asset->baseUrl);
                        
                        $chart->title = array(
                            'text' => 'Klausurnote',
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
                            'orient' => 'vertical',
                            'left' => 'left',
                            'data' => array(
                            '1.0','1.3','1.7','2.0','2.3','2.7','3.0','3.3','3.7','4.0','5.0'
                            ) 
                        );
                        
                        $chart->series = array(
                            array(
                                'name' => 'Punkte',
                                'type' => 'pie',
                                'radius' => '80%',
                                
                                'center' => array('50%', '55%'),
                                'data' => array(
                                    array('value'=>Klausurnote::KlausurnotePerson1_0($modelKlausurnote->KlausurID), 'name'=>'1.0'),
                                    array('value'=>Klausurnote::KlausurnotePerson1_3($modelKlausurnote->KlausurID), 'name'=>'1.3'),
                                    array('value'=>Klausurnote::KlausurnotePerson1_7($modelKlausurnote->KlausurID), 'name'=>'1.7'),
                                    array('value'=>Klausurnote::KlausurnotePerson2_0($modelKlausurnote->KlausurID), 'name'=>'2.0'),
                                    array('value'=>Klausurnote::KlausurnotePerson2_3($modelKlausurnote->KlausurID), 'name'=>'2.3'),
                                    array('value'=>Klausurnote::KlausurnotePerson2_7($modelKlausurnote->KlausurID), 'name'=>'2.7'),
                                    array('value'=>Klausurnote::KlausurnotePerson3_0($modelKlausurnote->KlausurID), 'name'=>'3.0'),
                                    array('value'=>Klausurnote::KlausurnotePerson3_3($modelKlausurnote->KlausurID), 'name'=>'3.3'),
                                    array('value'=>Klausurnote::KlausurnotePerson3_7($modelKlausurnote->KlausurID), 'name'=>'3.7'),
                                    array('value'=>Klausurnote::KlausurnotePerson4_0($modelKlausurnote->KlausurID), 'name'=>'4.0'),
                                    array('value'=>Klausurnote::KlausurnotePerson5_0($modelKlausurnote->KlausurID), 'name'=>'5.0'),
                                ),
                                'itemStyle' => array(
                                    'emphasis' => array(
                                        'shadowBlur'=>'50', 
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
