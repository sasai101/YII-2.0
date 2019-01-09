<?php

use common\models\Klausurnote;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use backend\assets\EchartsAsset;
use Hisune\EchartsPHP\ECharts;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var common\models\Klausur $model
 */

$this->title = 'Klausureinsicht';
$this->params['breadcrumbs'][] = ['label' => 'Alle Modul', 'url' => ['klausurlistview', 'id'=>$model->ModulID]];
$this->params['breadcrumbs'][] = ['label' => HtmlPurifier::process(mb_substr($model->modul->Bezeichnung, 0, 15).'......'), 'url' => ['index', 'id'=>$model->ModulID]];
$this->params['breadcrumbs'][] = 'Klausureinsicht';
?>

<div class="klausur-view">

	<!-- Leere Zeile -->
	<div class="row"></br></div>
		
	<div class="panel panel-default">
    <div class="panel-body">
		
		<!-- Titel -->
	<div>
		<h3>
			<?= Html::encode($model->modul->Bezeichnung); ?>
		</h3>
	</div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>	
	
	
	<div>
		<div class="col-md-4">
        	<!-- Professor -->
        	<div class="panel panel-warning">
              <div class="panel-heading"><h5>Professor</h5></div>
              	<div class="panel-body">
				
					<div>
                		</br>
                		<div class="row">
                    		<?php foreach ($model->modul->modulLeitetProfessors as $professor):?>
                    			<div class="col-md-3">
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
            
        	
        	
        	<!-- Leere Zeile -->
        	<div class="row"></br></div>
        	<!-- Leere Zeile -->
        	<div class="row"></br></div>	
        	
        	
        	<div class="panel panel-danger">
              <div class="panel-heading"><h5>Mitarbeiter</h5></div>
              	<div class="panel-body">
				
					<!-- Mitarbeiter -->
                	<div>
                		<p align="center"></p>
                		</br>
                		<?php $imge=$model->mitarbeiterMarterikelNr->marterikelNr->Profiefoto?>
                		<?= Html::a("<img src = '$imge' class='img-circle' alt='user image' height = '100' width='100' />", ['mitarbeiter/view', 'id'=>$model->Mitarbeiter_MarterikelNr])?>
                		
                		<p>&nbsp&nbsp&nbsp&nbsp<?php echo $model->mitarbeiterMarterikelNr->marterikelNr->Vorname." ".$model->mitarbeiterMarterikelNr->marterikelNr->Nachname ?></p>
                	</div>
				
				</div>
            </div>
    	</div>
    	
    	<div class="col-md-8">
    	<div class="panel panel-success">
          <div class="panel-body">
        
        	<!-- Echart -->
        	<div class="col-md-4">
        		<div class="col-md-12">
        			<?php $form = ActiveForm::begin([
                            'enableAjaxValidation'=>true,
                    ]); ?>
        			
        			<?= $form->field($model, 'Max_Punkte')->textInput() ?>
    
                    <?= $form->field($model, 'punkt1_0')->textInput() ?>
                
                    <?= $form->field($model, 'punkt1_3')->textInput() ?>
                
                    <?= $form->field($model, 'punkt1_7')->textInput() ?>
                
                    <?= $form->field($model, 'punkt2_0')->textInput() ?>
                
                    <?= $form->field($model, 'punkt2_3')->textInput() ?>
                    
                    <?= $form->field($model, 'punkt2_7')->textInput() ?>
                
                    <?= $form->field($model, 'punkt3_0')->textInput() ?>
                
                    <?= $form->field($model, 'punkt3_3')->textInput() ?>
                
                    <?= $form->field($model, 'punkt3_7')->textInput() ?>
                
                    <?= $form->field($model, 'punkt4_0')->textInput() ?>
    
                    <div class="form-group">
                            <?php // echo Html::submitButton('Save', ['class' => 'btn btn-success']); ?>
                    </div>
                    <?php ActiveForm::end(); ?>
        		</div>
        	</div>
        	<div class="col-md-8">
        		<div class="col-md-12">
            			<div class="panel panel-default">
                          <div class="panel-heading">Klausurnote <?php ?></div>
                          <div class="panel-body">
                          <div class="row">
                          	<div class="col-md-12">
                          		<?php Pjax::begin();
                              		
                          		
                                    $asset = EchartsAsset::register($this);
                                    $chart = new ECharts($asset->baseUrl);
                                    
                                    $chart->title = array(
                                        'text' => 'Klausurnotenstatus',
                                        'subtext' => 'Anzahl der Studenten bei jeden Note',
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
                                        'Anzahl der Studenten'
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
                                            'data' => Klausurnote::NoteInArray(),
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
                                            'name' => 'Anzahl der Studenten',
                                            'type' => 'bar',
                                            'data' => Klausurnote::AnzahlDerPersonMitNotInArray($model->KlausurID),   
                                        )
                                    );
                                    echo $chart->render('simple-custom-1');
                                    Pjax::end()?>
                          	</div>
                          </div>
                          </div>
                        </div>
            	</div>
            	
            	<!--  Klausur Punktestatus  -->
            	<div class="col-md-12">
            			<div class="panel panel-default">
                          <div class="panel-heading">Klausurpunkte <?php ?></div>
                          <div class="panel-body">
                          <div class="row">
                          	<div class="col-md-12">
                          		<?php Pjax::begin();
                              		
                          		
                                    $asset = EchartsAsset::register($this);
                                    $chart = new ECharts($asset->baseUrl);
                                    
                                    $chart->title = array(
                                        'text' => 'Klausurpunktstatus',
                                        'subtext' => 'Anzahl der Studenten bei jeden Punkt',
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
                                        'Anzahl der Studenten'
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
                                            'data' => Klausurnote::KlausurnotePunktzahlInarray($model->KlausurID),
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
                                            'name' => 'Anzahl der Studenten',
                                            'type' => 'bar',
                                            'data' => Klausurnote::KlausurnoteAnzahlInarray($model->KlausurID),   
                                        )
                                    );
                                    echo $chart->render('simple-custom-2');
                                    Pjax::end()?>
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


