<?php
use yii\helpers\Html;
use common\models\BenutzerTeilnimmtUebungsgruppe;
use yii\helpers\HtmlPurifier;
use yii\widgets\ListView;
use common\models\ModulAnmeldenBenutzer;
use kartik\detail\DetailView;
use yii\widgets\Pjax;
use common\models\Abgabe;
use common\models\AbgabeSuchen;
use common\models\Klausurnote;
use common\models\KlausurSuchen;
use common\models\KlausurnoteSuchen;
use common\models\Uebung;
/**
 * @var yii\web\View $this
 * @var common\models\Benutzer $model
 */
// Den ganzen Name von Benutzer in der Titelzeil zeigen
$this->title = $model->Vorname." ".$model->Nachname;
$this->params['breadcrumbs'][] = ['label' => 'Benutzers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="benutzer-view">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

	<!-- Erste Stücke -->
	<div class="row">
	    <!-- Personliche Details -->
		<div class="col-md-4">
    		<div class="panel panel-danger">
        		<div class="panel-heading">
            		<h3 class="panel-title">Personliche Daten</h3>
        		</div>
        		<div class="panel-body">
        			<!-- Profiefoto -->
            		<div class="row">
            		 	<div class="col-md-1"></div>
            			<?php $imge = $model->Profiefoto?>
    					<?= Html::img($imge,['class'=>'img-circle','alt'=>'user image', 'height'=>'90', 'width'=>'90'])?>
            		</div>
            		
            		<!-- Leere Zeichnen -->
            		<div></br></div>
            		
            		<!-- Detailview -->
            		<div>
              			 <?= DetailView::widget([
                            'model' => $model,
                            'condensed' => false,
                            'hover' => true,
                            'mode' => Yii::$app->request->get('edit') == 't' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
                            /*'panel' => [
                                'heading' => $this->title,
                                'type' => DetailView::TYPE_INFO,
                            ],*/
                            'attributes' => [
                                'MarterikelNr',
                                'Benutzername',
                                'email:email',
                                //'password_hash',
                                //'password_reset_token',
                                //'auth_key',
                                'Vorname',
                                'Nachname',
                                [
                                    'attribute' => 'created_at',
                                    'format'=>['date','php:d-m-Y H:i:s'],
                                ],
                                //'updated_at',
                                [
                                    'attribute' => 'updated_at',
                                    'format'=>['date','php:d-m-Y H:i:s'],
                                ],
                                
                            ],
                            'deleteOptions' => [
                                'url' => ['delete', 'id' => $model->MarterikelNr],
                            ],
                            'enableEditMode' => true,
                        ]) ?>
                    </div>
       		 	</div>
    		</div>
		</div>
		
		<!-- Teilnahme Deitails  -->
		<div class="col-md-8">
			<div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Allefächer und übungen</h3>
                </div>
                <div class="panel-body">
                    <!-- Übungsgruppen und Übungen -->	
                	<div class="col-md-5">
                	<div><h5>Übungen und Übungsgruppe</h5></div>	
                	<!-- Leere Zeile -->
                	<div class="row"></br></div>
                		<div>
                			<table class="table table-condensed" >
                				<tr>
                					<th>#</th>
                					<th>Übung</th>
                					<th>Übungsleiter</th>
                					<th>Übungsgruppe</th>
                					<th>Tutor</th>
                				</tr>
                				<?php $i=1?>
                				<?php foreach (BenutzerTeilnimmtUebungsgruppe::find()->where(['Benuter_MarterikelNr'=>$model->MarterikelNr])->all() as $uebung):?>
                				<tr>
                					<th><?php echo $i?></th>
                					<td><?php echo HtmlPurifier::process(mb_substr($uebung->uebungsgruppe->uebungs->Bezeichnung, 0, 20).'......')?></td>
                					<td><?php echo $uebung->uebungsgruppe->uebungs->mitarbeiterMarterikelNr->marterikelNr->Vorname." ".$uebung->uebungsgruppe->uebungs->mitarbeiterMarterikelNr->marterikelNr->Nachname?></td>
                					<td><?php echo $uebung->uebungsgruppe->GruppenNr?></th>
                					<td><?php echo $uebung->uebungsgruppe->tutorMarterikelNr->marterikelNr->Vorname." ".$uebung->uebungsgruppe->tutorMarterikelNr->marterikelNr->Vorname?></td>
                					<?php $i++?>
                				</tr>
                				<?php endforeach;?>
                			</table>
                		</div>
                	</div>
                	
                	<!-- Leere Zeile -->
                	<div class="col-md-1"></div>
                	
                	<!-- Übungsgruppen und Übungen -->	
                	<div class="col-md-5">
                	<div><h5>Besuchte Modul</h5></div>	
                	<!-- Leere Zeile -->
                	<div class="row"></br></div>
                		<div>
                			<table class="table table-condensed">
                				<tr>
                					<th>#</th>
                					<th>Modul</th>
                					<th colspan="2" >Professor</th>
                				</tr>
                				<?php $i=1?>
                				<?php foreach (ModulAnmeldenBenutzer::find()->where(['Benutzer_MarterikelNr'=>$model->MarterikelNr])->all() as $modul):?>
                				<tr>
                					<th><?php echo $i?></th>
                					<td><?php echo $modul->modul->Bezeichnung?></td>
                					
                						<?php foreach ($modul->modul->modulLeitetProfessors as $professor):?>
                							<td>Prof. Dr. <?php echo $professor->professorMarterikelNr->marterikelNr->Vorname." ".$professor->professorMarterikelNr->marterikelNr->Vorname?></td>
                						<?php endforeach;?>
                				</tr>
                				<?php $i++?>
                				<?php endforeach;?>
                			</table>
                		</div>
                	</div>
                </div>
                
            </div>
		</div>	
		
	</div>
	
	<!-- Zeiwten Stück -->
	<div class="row">
		<div class="col-md-12">
    		<div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Allen Übungsnoten</h3>
                </div>
                <!-- Body -->
                <div class="panel-body">
                  	  <div class="uebung">
                		  <?php $modelubung = BenutzerTeilnimmtUebungsgruppe::find()->where(['Benuter_MarterikelNr'=>$model->MarterikelNr])->all();?>
                		  <?php foreach ($modelubung as $ubung):?>
                		  
                		  <!-- Übungsbezeichnung -->
                		  <div class="row">
                		  		<div class="col-md-12">
                		  			<h2><?php echo $ubung->uebungsgruppe->uebungs->Bezeichnung?>
	                		  		<!-- Echarts Weiterleitung -->
                		  			&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo Html::a('<i class="fa fa-bar-chart"></i>',['abgabe/echartsabgabe', 'uebungsID'=>$ubung->uebungsgruppe->UebungsID,'marterikelNr'=>$model->MarterikelNr])?></h2>
                		  		</div>
                		  </div>
                		  
                		  <!-- Übungsgruppe -->
                		  <div class="row">
                		  		<div class="col-md-12">
                		  			<h5>Übungsleiter:  <b><?php echo $ubung->uebungsgruppe->uebungs->mitarbeiterMarterikelNr->marterikelNr->Vorname." ".$ubung->uebungsgruppe->uebungs->mitarbeiterMarterikelNr->marterikelNr->Nachname?></b></h5>
                		  			<h5>Übungsgruppe: <b><?php echo $ubung->uebungsgruppe->GruppenNr?></b></h5>
                		  			<h5>Tutor:  <b><?php echo $ubung->uebungsgruppe->tutorMarterikelNr->marterikelNr->Vorname." ".$ubung->uebungsgruppe->tutorMarterikelNr->marterikelNr->Nachname?></b></h5>
                		  			
                		  			<h5>Gesamte Punkte: <b><?php echo "( ". Uebung::GesamtePunktederPerson($ubung->uebungsgruppe->UebungsgruppeID, $model->MarterikelNr)."/". Uebung::vollePunktderUebung($ubung->uebungsgruppe->UebungsID)." )"?></b></h5>
                		  			<h5>Zulassungsgrenze: <b><?php echo Uebung::zulassungsGrenze($ubung->uebungsgruppe->UebungsID)?> Punkte von allen</b></h5>
                		  			<h5><b><?php if(Uebung::GesamtePunktederPerson($ubung->uebungsgruppe->UebungsgruppeID, $model->MarterikelNr) >= Uebung::zulassungsGrenze($ubung->uebungsgruppe->UebungsID)){
                		  			             echo "Zugelassen";
                        		  			}else{
                        		  			     echo "Nicht zugelassen";
                        		  			}?></b></h5>
                		  		</div>
                		  		
                		  </div>
                		  <!-- Leere Zeile -->
                		  <div><br></div>
                		  
                		  <!-- Listview für alle Übungsnote -->
                		  <div class="row">
                		      	<div class="col-md-12">
                		      		<div class="row">
                    		  			<?php $searchModelAbgabe = new AbgabeSuchen;
                    		  			      $dateProviderAbgabe = $searchModelAbgabe->searchAlsAbgabe(Yii::$app->request->getQueryParams(),$ubung->uebungsgruppe->UebungsgruppeID, $model->MarterikelNr);
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
                            			        'maxButtonCount' => 20,
                            			        'nextPageLabel' => Yii::t('app', 'nächste'),
                            			        'prevPageLabel' => Yii::t('app', 'vorne'),
                            			    ],
                            			]); Pjax::end()?>
                		  			</div>
                		  		</div>
                		  </div>
                		  <?php endforeach;?>
                  	  </div>
                </div>
            </div>
        </div>
	</div>
	
	<!-- Dritten Stück -->
    <div class="row">
		<div class="col-md-12">
    		<div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Klausur</h3>
                </div>
                <div class="panel-body">
                
                <!-- Klausurliew  -->
                   	<?php $searchModelKlausurnote = new KlausurnoteSuchen;
                   	      $dateProviderKlausurnote = $searchModelKlausurnote->searchAlleKlausurVonBenutzer(Yii::$app->request->getQueryParams(), $model->MarterikelNr);
		  			?>
		  			<?php Pjax::begin(); echo ListView::widget([
        			    'id' => 'benutzerlist',
		  			    'dataProvider' => $dateProviderKlausurnote,
        			    'itemView' => '_klausurnotelistview',
        			    'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
        			    'itemOptions' => [
        			        'tag' => 'div',
        			        'class' => 'col-md-2'
        			    ],
        			    //'layout' => '{items} {pager}',
        			    'pager' => [
        			        'maxButtonCount' => 20,
        			        'nextPageLabel' => Yii::t('app', 'nächste'),
        			        'prevPageLabel' => Yii::t('app', 'vorne'),
        			    ],
        			]); Pjax::end()?>
                </div>
            </div>
        </div>
	</div>
	
</div>