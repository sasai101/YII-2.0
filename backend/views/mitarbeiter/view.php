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
use common\models\BenutzerAnmeldenKlausur;
use common\models\Klausur;
use common\models\Klausurnote;
use common\models\Uebung;
use common\models\Uebungsgruppe;
use common\models\UebungsgruppeSuchen;

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
                                'Buero',
                                
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
                    <!-- Übungen -->	
                	<div class="col-md-5">
                	<div><h5>leitenden Übungen</h5></div>	
                	<!-- Leere Zeile -->
                	<div class="row"></br></div>
                		<div>
                			<table class="table table-condensed" >
                				<tr>
                					<th>#</th>
                					<th>Übung</th>
                					<th>Modul</th>
                					<th>Anzahl der Teilname</th>
                				</tr>
                				<?php $i=1?>
                				<?php foreach (Uebung::find()->where(['Mitarbeiter_MarterikelNr'=>$model->MarterikelNr])->all() as $uebung):?>
                				<tr>
                					<th><?php echo $i?></th>
                					<td><?php echo HtmlPurifier::process(mb_substr($uebung->Bezeichnung, 0, 20).'......')?></td>
                					<td><?php echo HtmlPurifier::process(mb_substr($uebung->modul->Bezeichnung, 0, 20).'......')?></td>
                					<td><?php $gesamteLeute = 0;
                    					foreach ($uebung->uebungsgruppes as $gruppe){
                    					    $gesamteLeute += $gruppe->Anzahl_der_Personen;
                    					}
                    					echo $gesamteLeute;
                					?></td>
                					<?php $i++?>
                				</tr>
                				<?php endforeach;?>
                			</table>
                		</div>
                	</div>
                	
                	<!-- Leere Zeile -->
                	<div class="col-md-1"></div>
                	
                	<!-- Klausur -->	
                	<div class="col-md-5">
                	<div><h5>Klausuranmeldung</h5></div>	
                	<!-- Leere Zeile -->
                	<div class="row"></br></div>
                		<div>
                			<table class="table table-condensed">
                    			<tr>
                    				<th>#</th>
                    				<th>Klausur</th>
                    				<th>Modul</th>
                    				<th>Anzahl der Person</th>
                    			</tr>
                    			<?php $i=1?>
                    			<?php foreach (Klausur::find()->where(['Mitarbeiter_MarterikelNr'=>$model->MarterikelNr])->all() as $Klausur):?>
                    			<tr>
                    				<th><?php echo $i?></th>
                    				<td><?php echo $Klausur->Bezeichnung?></td>
                    				<td><?php echo HTMLPurifier::process(mb_substr($Klausur->modul->Bezeichnung,0,25).'......')?></td>
                    				<td><?php echo BenutzerAnmeldenKlausur::find()->where(['KlausurID'=>$Klausur->KlausurID])->count()?></td>
                    			</tr>
                    			<?php $i++?>
                    			<?php endforeach;?>
                    		</table>
                		</div>
                		
                	<div><h5>Klausurnote</h5></div>	
                	<!-- Leere Zeile -->
                	<div class="row"></br></div>
                		<div>
                			<table class="table table-condensed">
                    			<tr>
                    				<th>#</th>
                    				<th>Klausur</th>
                    				<th>Modul</th>
                    				<th>Anzahl der Person</th>
                    			</tr>
                    			<?php $i=1?>
                    			<?php foreach (Klausur::find()->where(['Mitarbeiter_MarterikelNr'=>$model->MarterikelNr])->all() as $Klausurnote):?>
                    			<tr>
                    				<th><?php echo $i?></th>
                    				<td><?php echo $Klausurnote->Bezeichnung?></td>
                    				<td><?php echo HTMLPurifier::process(mb_substr($Klausur->modul->Bezeichnung,0,25).'......')?></td>
                    				<td><?php echo Klausurnote::find()->where(['KlausurID'=>$Klausur->KlausurID])->count()?></td>
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
                    <h3 class="panel-title">Allen leitenden Übungen</h3>
                </div>
                <!-- Body -->
                <div class="panel-body">
                  	  <div class="uebung">
                		  <?php $modelubung = Uebung::find()->where(['Mitarbeiter_MarterikelNr'=>$model->MarterikelNr])->all();?>
                		  <?php foreach ($modelubung as $ubung):?>
                		  <!-- Übungsbezeichnung -->
                		  <div class="row">
                		  		<div class="col-md-12">
                		  			<h2><?php echo $ubung->Bezeichnung?></h2>
                		  		</div>
                		  </div>
                		  
                		  <!-- Übungsgruppe -->
                		  <div class="row">
                		  		<div class="col-md-12">
                		  			<h5>Gruppenanzahl  <b><?php echo Uebungsgruppe::find()->where(['UebungsID'=>$ubung->UebungsID])->count();?></b></h5>
                		  			<h5>Zulassungsgrenze : <b><?php echo $ubung->Zulassungsgrenze?>%</b></h5>
                		  			<h5>Teilnahmeranzahl <b><?php $teilnahmer = 0;
                		  			foreach ($ubung->uebungsgruppes as $gruppe){
                		  			    $teilnahmer += $gruppe->Anzahl_der_Personen;
                		  			}
                		  			echo $teilnahmer;
                		  			?></b></h5>
                		  			<h5>Anzahl der zugelassene Person: <b><?php echo BenutzerAnmeldenKlausur::find()->where(['KlausurID'=>$Klausur->KlausurID])->count()?></b></h5>
                		  			<h5>Nicht zugelassen: <b><?php echo $teilnahmer - BenutzerAnmeldenKlausur::find()->where(['KlausurID'=>$Klausur->KlausurID])->count()?></b></h5>
                		  			
                		  		</div>
                		  </div>
                		  <!-- Leere Zeile -->
                		  <div><br></div>
                		  
                		  <!-- Listview für alle Übungsnote -->
                		  <div class="row">
                		      	<div class="col-md-12">
                		      		<div class="row">
                    		  			<?php $searchModelUebungsgruppe = new UebungsgruppeSuchen;
                    		  			      $dateProviderUebungsgruppe = $searchModelUebungsgruppe->searchalleGruppe(Yii::$app->request->getQueryParams(),$ubung->UebungsID);
                    		  			?>
                    		  			<?php Pjax::begin(); echo ListView::widget([
                            			    'id' => 'benutzerlist',
                    		  			    'dataProvider' => $dateProviderUebungsgruppe,
                            			    'itemView' => '_gruppelistview',
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
                    <h3 class="panel-title">Klausurnote</h3>
                </div>
                <div class="panel-body">
                   		 这是一个基本的面板
                </div>
            </div>
        </div>
	</div>
	
</div>

