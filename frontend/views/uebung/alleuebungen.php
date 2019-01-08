<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UebungSuchen */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uebungs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uebung-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
            
                <div class="panel-body">
                
                <div class="row"></br></div>
                
                <div class="row">
                	<div class="col-md-3">
                        <p>
                        	<?php  //echo $this->render('_searchgruppe', ['model' => $searchModel]); ?>
                    	</p>
            		</div>
            	</div>
                          		
            		<div class="row">
            			<div class="col-md-12">
            			<!-- Leere Zeile -->
                    	<div class="row"></br></div>
                    	<!-- Leere Zeile -->
                    	<div class="row"></br></div>	
            				<?php echo ListView::widget([
                                  'dataProvider' => $dataProvider,
                                  'itemView' => '_uebungsgruppelistview',
                                  'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
                                  'itemOptions' => [
                                    'tag' => 'div',
                                    'class' => 'col-lg-2'
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
                                
                    <div class="row">
              			<div class="col-md-3">
              				<p>
                                <?php echo Html::a('Tabellarische Form', ['index'], ['class' => 'btn btn-success'])  ?>
                            </p>
              			</div>
              		</div>
            
            	</div>
            </div>            
    	</div>
	</div>
</div>