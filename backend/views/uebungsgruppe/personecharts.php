<?php

use backend\assets\EchartsAsset;
use Hisune\EchartsPHP\ECharts;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use common\models\AbgabeSuchen;

$this->title = 'Übungsgruppe '.$modelUebungsgruppe->GruppenNr;
$this->params['breadcrumbs'][] = ['label' => 'Alle Übungen', 'url' => ['uebungsgruppe/alleuebungen']];
$this->params['breadcrumbs'][] = ['label' => 'Alle Übungsgruppen', 'url' => ['uebungsgruppe/alleuebungsgruppe','id'=>$modelUebungsgruppe->UebungsID]];
$this->params['breadcrumbs'][] = ['label' => 'Übungsgruppe '.$modelUebungsgruppe->GruppenNr, 'url' => ['uebungsgruppe/gruppendetails','id'=>$modelUebungsgruppe->UebungsgruppeID]];
$this->params['breadcrumbs'][] = $modelBenutzer->Vorname." ".$modelBenutzer->Nachname;
?>

<div class="uebungsgruppe">

	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Titel -->
	
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>	


	<div class="row">
		<div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
			  <div>
			  	<div class="row">
			  		<div class="col-md-12">
			  		<div>
                		<h4>
                			Student: <b><?php echo $modelBenutzer->Vorname." ".$modelBenutzer->Nachname?></b>
                		</h4>
                	</div>
                	
                	<div>
                		<h4>
                			Übung: <b><?php echo $modelUebungsgruppe->uebungs->Bezeichnung ?></b>
                		</h4>
                	</div>
			  		</div>
			  	</div>
			  	
			  	<!-- leere Zeichen -->
			  	<div></br></div>
			  	<!-- leere Zeichen -->
			  	<div></br></div>
			  	
			  	<div class="row">
			  		<div class="col-md-6">
		  				<div class="panel panel-info">
                          <div class="panel-heading">Punkt von alle Übungsblätter</div>
                          <div class="panel-body">
                          	<div class="col-md-12">
                          	<!-- leere Zeichen -->
		  					<div></br></div>
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
                                    echo $chart->render('simple-custom-uebung');
                                    Pjax::end()?>
                          	</div>
                          </div>
			  			</div>
			  			
			  		</div>
			  	</div>
			  	
			  	
			  	<div class="row">
			  		<div class="col-md-12">
		  				<div class="panel panel-warning">
                          <div class="panel-heading">Alle Abgabe</div>
                          <div class="panel-body">
							<div class="row">
								<div class="col-md-12">
								<!-- leere Zeichen -->
		  						<div></br></div>
		  							<?php $searchModelAbgabe = new AbgabeSuchen;
		  							$dateProviderAbgabe = $searchModelAbgabe->searchAlsAbgabe(Yii::$app->request->getQueryParams(),$modelUebungsgruppe->UebungsgruppeID, $modelBenutzer->MarterikelNr);
                		  			?>
                		  			<?php Pjax::begin(); echo ListView::widget([
                        			    'id' => 'benutzerlist',
                		  			    'dataProvider' => $dateProviderAbgabe,
                        			    'itemView' => '_notelistview',
                        			    'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
                        			    'itemOptions' => [
                        			        'tag' => 'div',
                        			        'class' => 'col-md-3',
                        			    ],
                        			    //'layout' => '{items} {pager}',
                        			    'pager' => [
                        			        'maxButtonCount' => 40,
                        			        'nextPageLabel' => Yii::t('app', 'nächste'),
                        			        'prevPageLabel' => Yii::t('app', 'vorne'),
                        			    ],
                        			]); Pjax::end()?>
								
								</div>
							</div>
						  </div>
                        </div>
		  			</div>
			  	</div>
			  	
			  	
			  </div>
			</div>
          </div>          
		</div>
	</div>
</div>