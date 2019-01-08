<?php
use backend\assets\EchartsAsset;
use Hisune\EchartsPHP\ECharts;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use common\models\Uebung;
use common\models\Uebungsgruppe;
use common\models\BenutzerTeilnimmtUebungsgruppe;
use common\models\BenutzerTeilnimmtUebungsgruppeSuchen;
use common\models\AbgabeSuchen;

?>

<div class="row">
	<div></br></div>
	<div class="panel panel-default">
    <div class="panel-body">
		
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
    			<h3>Übungsblatt <?php echo $modelBlaetter->UebungsNr?></h3>
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
                  		<?php 
                      		
                  		
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
                                    'data' => Uebungsgruppe::GesamtePunktVonJedenBlattArray($model->UebungsgruppeID, $modelBlaetter->UebungsblatterID),
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
                            ?>
                  	</div>
                  </div>
                  </div>
                </div>
    		</div>
    		<div class="col-md-2"></div>
    	</div>
    	
    	<!-- Abgabe des einzeln Person -->
    	<div class="col-md-12">
    		<div class="panel panel-warning">
              <div class="panel-heading">Punkte Ditails von Übungsblatt  <?php echo $modelBlaetter->UebungsNr?></div>
              <div class="panel-body">
              	<div class="col-md-12">
              		<h3>Alle Teilnahme von diesem Gruppe</h3>
              		<!-- Listview für alle Übungsnote -->
            		  <div class="row">
        		      	<div class="col-md-12">
        		      		<div class="row">
            		  			<div class="row">
            		  			<?php $searchModelAbgabe = new AbgabeSuchen;
            		  			      $dateProviderAbgabe = $searchModelAbgabe->searchAlsGruppe(Yii::$app->request->getQueryParams(), $model->UebungsgruppeID, $modelBlaetter->UebungsblatterID);
            		  			?>
            		  			<?php echo ListView::widget([
                    			    'id' => 'benutzerlist',
            		  			    'dataProvider' => $dateProviderAbgabe,
                    			    'itemView' => '_notevonallebenutzervongruppelistview',
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
                    			]);?>
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