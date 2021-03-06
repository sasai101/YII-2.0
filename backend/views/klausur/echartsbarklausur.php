<?php
use backend\assets\EchartsAsset;
use Hisune\EchartsPHP\ECharts;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use common\models\Klausurnote;

?>

<div class="row">
    <!-- Leere Zeile -->
    <div></br></div>
    <div class="panel panel-default">
      	<div class="panel-body">
			
			<div class="row">
        	</br>
        	</br></br></br>
        	</div>
        	
        	<div class="col-md-12">
        		<div class="col-md-2"></div>
        		<div class="col-md-8">
        			<h3><?php echo $model->Bezeichnung?></h3>
        			<h3><?php echo $model->modul->Bezeichnung?></h3>
        		</div>
        		<div class="col-md-2"></div>
        	</div>
        	
        	<div class="row">
        	</br>
        	</br></br></br></br>
        	</div>
        	
        	<div class="col-md-12">
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
        
                        <!--  <div class="form-group">
                                <?php // echo Html::submitButton('Save', ['class' => 'btn btn-success']); ?>
                        </div>-->
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
