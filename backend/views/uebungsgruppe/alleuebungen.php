<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\UebungSuchen $searchModel
 */

$this->title = 'Alle Übungen';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin();?>
<div class="modul-index">

	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Titel -->
	<div>
		<h2>
			Übungsgruppe
		</h2>
	</div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>	

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Uebung', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>
    
    <div class = "row">
        <?php Pjax::begin(); echo ListView::widget([
              'dataProvider' => $dataProvider,
              'itemView' => '_uebungsgruppelistview',
              'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
              'itemOptions' => [
                'tag' => 'div',
                'class' => 'col-lg-3'
              ],
              
              'pager' => [
               
                'maxButtonCount' => 12,
                'prevPageLabel' => 'Vorne',
                'nextPageLabel' => 'Nächste',
              ]
        ]);Pjax::end(); 
        
        ?>
    </div>

</div>
<?php Pjax::end();?>
