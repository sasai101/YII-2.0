<?php


use yii\widgets\ListView;
use yii\widgets\Pjax;

?>


<div class= "benutzer-index">
<!-- 
	<div class="row">
    	<div class="col-md-3">
    	<?php //echo $this->render('_search', ['model' => $searchModel]);?>
    	</div>
	</div> -->
	<div class = "row">
		
			<?php Pjax::begin(); echo ListView::widget([
			    'id' => 'benutzerlist',
			    'dataProvider' => $dataProvider,
			    'itemView' => '_benuzterlist',
			    'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
			    'itemOptions' => [
			        'tag' => 'div',
			        'class' => 'col-md-1'
			    ],
			    //'layout' => '{items} {pager}',
			    'pager' => [
			        'maxButtonCount' => 10,
			        'nextPageLabel' => Yii::t('app', 'nächste'),
			        'prevPageLabel' => Yii::t('app', 'vorne'),
			    ],
			]); Pjax::end()?>

			
	</div>

</div>