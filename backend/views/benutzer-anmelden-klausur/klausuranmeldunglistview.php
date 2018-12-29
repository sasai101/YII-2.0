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
	<div>
		<h2>
			Klausuranmeldung
		</h2>
	</div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>	
	
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class = "row">
        <?php Pjax::begin(); echo ListView::widget([
              'dataProvider' => $dataProvider,
              'itemView' => '_einzelAnmeldung',
              'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
              'itemOptions' => [
                'tag' => 'div',
                'class' => 'col-lg-3'
              ],
              
              'pager' => [
               
                'maxButtonCount' => 20,
                'prevPageLabel' => 'Vorne',
                'nextPageLabel' => 'Nächste',
              ]
        ]);Pjax::end(); 
        
        ?>
    </div>

</div>