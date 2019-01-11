<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = 'Übungsgruppe '.$modelUebungsgruppe->GruppenNr;
$this->params['breadcrumbs'][] = ['label' => 'Alle Übungen', 'url' => ['uebung/alleuebungsgruppe']];
$this->params['breadcrumbs'][] = ['label' => 'Alle Übungsgruppen', 'url' => ['uebungsgruppe/alleuebungsgruppe','id'=>$modelUebungsgruppe->UebungsID]];
$this->params['breadcrumbs'][] = 'Übungsgruppe '.$modelUebungsgruppe->GruppenNr;
?>

<?php Pjax::begin();?>


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
                    			Modul: <b><?php echo $modelUebungsgruppe->uebungs->modul->Bezeichnung ?></b>
                    		</h4>
                    	</div>
                    	
                    	<div>
                    		<h4>
                    			Übungsgruppe <b><?php echo $modelUebungsgruppe->GruppenNr ?></b>
                    		</h4>
                    	</div>
                    	
                    	<div>
                    		<h3>
                    			<b><?php echo Html::a('<i class="fa fa-bar-chart"></i>',['uebungsgruppe/uebungsgruppebarecharts','uebungsgruppeID'=>$modelUebungsgruppe->UebungsgruppeID])?></b>
                    		</h3>
                    	</div>
                	
			  		</div>
			  	</div>
			  	
			  	<!-- leere Zeichen -->
			  	<div></br></div>
			  	<!-- leere Zeichen -->
			  	<div></br></div>
			  	
			  	<div class="row">
			  		<div class="col-md-12">
			  			<div class="col-md-6">
			  				<div class="panel panel-info">
                              <div class="panel-heading">Alle Teilnahmer</div>
                              <div class="panel-body">
                              	<div class="col-md-12">
                              	<!-- leere Zeichen -->
			  					<div></br></div>
                              		<?php
                                    echo ListView::widget([
                                        'id' => 'benutzerlist',
                                        'dataProvider' => $dataProvider,
                                        'itemView' => '_teilnahmerlist',
                                        'viewParams' => ['modelUebungsgruppe' => $modelUebungsgruppe],
                                        'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
                                        'itemOptions' => [
                                            'tag' => 'div',
                                            'class' => 'col-md-3'
                                        ],
                                        // 'layout' => '{items} {pager}',
                                        'pager' => [
                                            'maxButtonCount' => 5,
                                            'nextPageLabel' => Yii::t('app', 'nächste'),
                                            'prevPageLabel' => Yii::t('app', 'vorne')
                                        ]
                                    ]);?>
                              	</div>
                              </div>
                            </div>
			  			</div>
			  			<div class="col-md-6">
			  				<div class="panel panel-warning">
                              <div class="panel-heading">Alle Abgabe</div>
                              <div class="panel-body">
								<div class="row">
									<div class="col-md-12">
									<!-- leere Zeichen -->
			  						<div></br></div>
										<?php
                                        echo ListView::widget([
                                            'id' => 'benutzerlist',
                                            'dataProvider' => $dataProvider1,
                                            'itemView' => '_abgabeblaetterlist',
                                            'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',            
                                            //weitere Parameter
                                            'viewParams' => ['modelUebungsgruppe' => $modelUebungsgruppe],
                                            'itemOptions' => [
                                                'tag' => 'div',
                                                'class' => 'col-md-3'
                                            ],
                                            // 'layout' => '{items} {pager}',
                                            'pager' => [
                                                'maxButtonCount' => 5,
                                                'nextPageLabel' => Yii::t('app', 'nächste'),
                                                'prevPageLabel' => Yii::t('app', 'vorne')
                                            ]
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
	</div>
</div>