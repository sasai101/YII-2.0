<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;
use common\models\Uebung;
use common\models\Uebungsgruppe;
use common\models\UebungsgruppeSuchen;

/**
 * @var yii\web\View $this
 * @var common\models\Modul $model
 */

?>

<div class="modul-view">

	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Titel -->	
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>

	<div class="row">
		<div class="col-md-12">
    		<div class="col-md-4">
				<div class="panel panel-info">
                  <div class="panel-heading"><h4>Professor</h4></div>
                  <div class="panel-body">
				  	<div class="col-md-12">
				  		<div class="row"></br></div>
				  		<div class="row"></br></div>
				  		<?php foreach ($model->modulLeitetProfessors as $professor):?>
                			<div class="col-md-4">
                			<?php $imge=$professor->professorMarterikelNr->marterikelNr->Profiefoto?>
                			<div>
                				<?= Html::a("<img src = '$imge' class='img-circle' alt='user image' height = '100' width='100' />", ['professor/view', 'id'=>$professor->Professor_MarterikelNr]) ?>
                				<p>Prof. Dr. <?php echo $professor->professorMarterikelNr->marterikelNr->Vorname." ".$professor->professorMarterikelNr->marterikelNr->Nachname ?></p>
                			</div>
                			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                			</div>
                		<?php endforeach; ?>
				  	</div>
				  </div>
                </div>
			</div>
    		<div class="col-md-4">
				<div class="panel panel-warning">
                  <div class="panel-heading"><h4>Mitarbeiter</h4></div>
                  <div class="panel-body">
				  	<div class="col-md-12">
				  		<div class="row"></br></div>
				  		<?php foreach ($model->uebungs as $uebung):?>
				  			<p><b><?php echo $uebung->Bezeichnung?></b></p>
                			<div class="col-md-4">
                			<?php $imge=$uebung->mitarbeiterMarterikelNr->marterikelNr->Profiefoto?>
                			<div>
                				<?= Html::a("<img src = '$imge' class='img-circle' alt='user image' height = '100' width='100' />", ['mitarbeiter/view', 'id'=>$uebung->Mitarbeiter_MarterikelNr]) ?>
                				<p><?php echo $uebung->mitarbeiterMarterikelNr->marterikelNr->Vorname." ".$uebung->mitarbeiterMarterikelNr->marterikelNr->Nachname ?></p>
                				
                			</div>
                			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                			</div>
                		<?php endforeach; ?>
				  	</div>
				  </div>
                </div>
			</div>
			<!-- Gruppen INfor -->
			<div class="col-md-4">
				<div class="panel panel-danger">
                  <div class="panel-heading"><h4>Gruppeninformation</h4></div>
                  <div class="panel-body">
				  	<div class="col-md-12">
				  		<div class="row"></br></div>
				  		<table class="table table-condensed" >
            				<tr>
            					<th>GruppenNr</th>
            					<th>Tutor</th>
            					<th>Teilnahmer</th>
            					<th>Freie Platz</th>
            				</tr>
            				<?php foreach ($uebung->uebungsgruppes as $gruppe):?>
            				<tr>
            					<td><?php echo $gruppe->GruppenNr?></td>
            					<td><?php echo $gruppe->tutorMarterikelNr->marterikelNr->Vorname." ".$gruppe->tutorMarterikelNr->marterikelNr->Vorname?></td>
            					<td><?php echo $gruppe->Anzahl_der_Personen?></td>
            					<th><?php echo $gruppe->Max_Person - $gruppe->Anzahl_der_Personen?></th>
            				</tr>
            				<?php endforeach;?>
            			</table>
				  	</div>
				  </div>
                </div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-12">
				<div class="panel panel-danger">
                  <div class="panel-heading"><h4>Gruppeninformation</h4></div>
                  <div class="panel-body">
				  	<div class="col-md-12">
    		      		<div class="row">
                		  		<div class="col-md-12">
                		  			<h5>Gruppenanzahl  <b><?php echo Uebungsgruppe::find()->where(['UebungsID'=>$uebung->UebungsID])->count();?></b></h5>
                		  			<h5>Zulassungsgrenze : <b><?php echo $uebung->Zulassungsgrenze?>%</b></h5>
                		  			<h5>Teilnahmeranzahl <b><?php echo Uebung::AnzahlAllePersonUebung($uebung->UebungsID)?></b></h5>
                		  			<h5>Anzahl der zugelassene Person: <b><?php echo Uebung::AnzahlderzugelassenenPerson($uebung->UebungsID)?></b></h5>
                		  			<h5>Nicht zugelassen: <b><?php echo Uebung::AnzahldernichtzugelassenenPerson($uebung->UebungsID)?></b></h5>
                		  			
                		  		</div>
                		  </div>
                		  
                		  <!-- Leere Zeile -->
                		  <div><br></div>
                		  
                		  <div class="row">
                		  		<div class="col-md-12">
                		      		<?php foreach ($model->uebungs as $uebung):?>
                    		  			<?php $searchModelUebungsgruppe = new UebungsgruppeSuchen;
                    		  			      $dateProviderUebungsgruppe = $searchModelUebungsgruppe->searchalleGruppe(Yii::$app->request->getQueryParams(),$uebung->UebungsID);
                    		  			?>
                    		  			<?php echo ListView::widget([
                            			    'id' => 'benutzerlist',
                    		  			    'dataProvider' => $dateProviderUebungsgruppe,
                            			    'itemView' => '_gruppelistview',
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
                            			])?>
                            		<?php endforeach; ?>
                        		
            		  			</div>
                		  </div>
                		  
    		  		 </div>
				  </div>
               </div>
			</div>
		</div>
	</div>
	
</div>

