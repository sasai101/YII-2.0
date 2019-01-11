<?php

use common\models\Uebung;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\UebungSuchen $searchModel
 */

$this->title = 'Alle Übungsgruppe';
$this->params['breadcrumbs'][] = ['label' => 'Alle Übungen', 'url' => ['uebung/alleuebungsgruppe']];
$this->params['breadcrumbs'][] = $this->title;
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
			<div class="panel panel-primary">
              <div class="panel-heading"><h3>Übungsgruppe</h3></div>
              	<div class="panel-body">
              	
					<div class="row"></br></div>
					<div class="row">
						<div class="col-md-12">
							<h4> Modul: <b><?php echo $model->modul->Bezeichnung?></b></h4>
							<h4> Übung: <b><?php echo $model->Bezeichnung?></b></h4>
							<h4> Übungsleiter: <b><?php echo $model->getBenutzerNname($model->Mitarbeiter_MarterikelNr)?></b></h4>
							<h4> Anzahl der Teilnahmer: <b><?php echo Uebung::AnzahlAllePersonUebung($model->UebungsID)?></b></h4>
						</div>
					</div>
					<div class="row"></br></div>
					
              		
              		
					<div class="row">
						<div class="col-md-12">
						<!-- Leere Zeile -->
                    	<div class="row"></br></div>
                    	<!-- Leere Zeile -->
                    	<div class="row"></br></div>	
							<?php echo ListView::widget([
                                  'dataProvider' => $dataProvider,
                                  'itemView' => '_einzelgruppe',
                                  'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
                                  'itemOptions' => [
                                    'tag' => 'div',
                                    'class' => 'col-lg-1'
                                  ],
                                  
                                  'pager' => [
                                   
                                    'maxButtonCount' => 12,
                                    'prevPageLabel' => 'Vorne',
                                    'nextPageLabel' => 'Nächste',
                                  ]
                            ]);
                            
                            ?>
						</div>
					</div>
					
					
                    <div class="row"></br></div>
                    
                    
				</div>
            </div>            
		</div>
	</div>
</div>

