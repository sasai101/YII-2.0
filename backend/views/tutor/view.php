<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\ListView;
use kartik\detail\DetailView;
use yii\widgets\Pjax;
use common\models\Uebung;
use common\models\Uebungsgruppe;
use common\models\UebungsblaetterSuchen;

/**
 * @var yii\web\View $this
 * @var common\models\Benutzer $model
 */

// Den ganzen Name von Benutzer in der Titelzeil zeigen
$this->title = $model->Vorname." ".$model->Nachname;
$this->params['breadcrumbs'][] = ['label' => 'Tutor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutor-view">
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
                                [
                                    'label' => 'Benutzername',
                                    'value' => $model->marterikelNr->Benutzername,
                                ],
                                [
                                    'label' => 'Vorname',
                                    'value' => $model->marterikelNr->Vorname,
                                ],
                                [
                                    'label' => 'Nachname',
                                    'value' => $model->marterikelNr->Nachname,
                                ],
                                [
                                    'label' => 'Email',
                                    'value' => $model->marterikelNr->email,
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
                    <h3 class="panel-title">Alle leitende Übungsgruppe</h3>
                </div>
                <div class="panel-body">
                    <!-- Übungen -->	
                	<div class="col-md-12">
                	<div><h5>leitenden Übungsgruppe</h5></div>	
                	<!-- Leere Zeile -->
                	<div class="row"></br></div>
                		<div>
                			<table class="table table-condensed" >
                				<tr>
                					<th>#</th>
                					<th>Übung</th>
                					<th>Modul</th>
                					<th>Übungsgruppe</th>
                					<th>Übungsleiter</th>
                				</tr>
                				<?php $i=1?>
                				<?php foreach (Uebungsgruppe::find()->where(['Tutor_MarterikelNr'=>$model->MarterikelNr])->all() as $uebungsgruppe):?>
                				<tr>
                					<th><?php echo $i?></th>
                					<td><?php echo HtmlPurifier::process(mb_substr($uebungsgruppe->uebungs->Bezeichnung, 0, 25).'......')?></td>
                					<td><?php echo HtmlPurifier::process(mb_substr($uebungsgruppe->uebungs->modul->Bezeichnung, 0, 30).'......')?></td>
                					<td><?php echo $uebungsgruppe->GruppenNr?></td>
                					<td><?php echo $uebungsgruppe->uebungs->mitarbeiterMarterikelNr->marterikelNr->Vorname." ".$uebungsgruppe->uebungs->mitarbeiterMarterikelNr->marterikelNr->Vorname?></td>
                					<?php $i++?>
                				</tr>
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
                    <h3 class="panel-title">Allen leitenden Übungsgruppe</h3>
                </div>
                <!-- Body -->
                <div class="panel-body">
                  	  <div class="uebung">
                		  <?php $modelubungsgruppen = Uebungsgruppe::find()->where(['Tutor_MarterikelNr'=>$model->MarterikelNr])->all();?>
                		  <?php foreach ($modelubungsgruppen as $ubungsgruppe):?>
                		  <!-- Übungsbezeichnung -->
                		  <div class="row">
                		  		<div class="col-md-12">
                		  			<h2><?php echo $ubungsgruppe->uebungs->Bezeichnung?>
									&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo Html::a('<i class="fa fa-bar-chart"></i>',['uebungsgruppe/uebungsgruppebarecharts','uebungsgruppeID'=>$ubungsgruppe->UebungsgruppeID])?></h2>
                		  		</div>
                		  </div>
                		  
                		  <!-- Übungsgruppe -->
                		  <div class="row">
                		  		<div class="col-md-12">
                		  			<h5>Gruppe:  <b><?php echo $ubungsgruppe->GruppenNr;?></b></h5>
                		  			<h5>Anzahl des Teilnahmers  <b><?php echo Uebung::AnzahlAllePersonGruppe($ubungsgruppe->UebungsgruppeID);?></b></h5>
                		  			<h5>Zulassungsgrenze : <b><?php echo $ubungsgruppe->uebungs->Zulassungsgrenze?>%</b></h5>
                		  			<h5>Anzahl der zugelassene Person: <b><?php echo Uebung::AnzahlderzugelassenPersonderGruppe($ubungsgruppe->UebungsgruppeID)?></b></h5>
                		  			<h5>Nicht zugelassen: <b><?php echo Uebung::AnzahlAllePersonGruppe($ubungsgruppe->UebungsgruppeID)-Uebung::AnzahlderzugelassenPersonderGruppe($ubungsgruppe->UebungsgruppeID)?></b></h5>
                		  			
                		  		</div>
                		  </div>
                		  <!-- Leere Zeile -->
                		  <div><br></div>
                		  
                		  <!-- Listview für alle Übungsnote -->
                		  <div class="row">
                		      	<div class="col-md-12">
                		      		<div class="row">
                    		  			<?php $searchModelUeubngsblaetter = new UebungsblaetterSuchen;
                    		  			      $dateProviderUebungsgruppe = $searchModelUeubngsblaetter->searchalleBlaertter(Yii::$app->request->getQueryParams(),$ubungsgruppe->uebungs->UebungsID);
                    		  			?>
                    		  			<?php echo ListView::widget([
                            			    'id' => 'benutzerlist',
                    		  			    'dataProvider' => $dateProviderUebungsgruppe,
                            			    'itemView' => '_gruppeblaetterlistview',
                    		  			    //weitere Parameter
                    		  			    'viewParams' => ['ubungsgruppe' => $ubungsgruppe],
                            			    'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
                            			    'itemOptions' => [
                            			        'tag' => 'div',
                            			        'class' => 'col-md-3'
                            			    ],
                            			    //'layout' => '{items} {pager}',
                            			    'pager' => [
                            			        'maxButtonCount' => 30,
                            			        'nextPageLabel' => Yii::t('app', 'nächste'),
                            			        'prevPageLabel' => Yii::t('app', 'vorne'),
                            			    ],
                            			]);?>
                		  			</div>
                		  		</div>
                		  </div>
                		  <?php endforeach;?>
                  	  </div>
                </div>
            </div>
        </div>
	</div>
	
</div>

