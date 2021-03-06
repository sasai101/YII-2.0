<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\ModulSuchen $searchModel
 */
$this->title = 'Alle Modul';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modul-index">

	
	
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
              <div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
              	<div class="panel-body">
              	
					<div class="row"></br></div>
					
              		<div class="row">
              			<div class="col-md-3">
              				<p>
                                <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
                            </p>
              			</div>
              		</div>
              		
					<div class="row">
						<div class="col-md-12">
						<!-- Leere Zeile -->
                    	<div class="row"></br></div>
                    	<!-- Leere Zeile -->
                    	<div class="row"></br></div>	
							<div class = "row">
                            <?php Pjax::begin(); echo ListView::widget([
                                  'dataProvider' => $dataProvider,
                                  'itemView' => '_einzelAnmeldung',
                                  'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
                                  'itemOptions' => [
                                    'tag' => 'div',
                                    'class' => 'col-lg-1'
                                  ],
                                  
                                  'pager' => [
                                   
                                    'maxButtonCount' => 20,
                                    'prevPageLabel' => 'Vorne',
                                    'nextPageLabel' => 'Nächste',
                                  ]
                            ]);Pjax::end(); 
                            
                            ?>
						</div>
						<div class="row">
              			<div class="col-md-3">
              				<p>
                                <?php echo Html::a('Tabellarische Form', ['indexklausur'], ['class' => 'btn btn-success'])  ?>
                            </p>
              			</div>
              			</div>
					</div>
				</div>
            </div>            
		</div>
	</div>

</div>