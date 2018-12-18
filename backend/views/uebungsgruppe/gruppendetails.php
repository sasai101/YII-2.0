<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = 'Übungsgruppes';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>
<div class="panel panel-primary">
	<div class="panel-heading">
		<p>
			<b><h4>Alle Teilnahmer:</b>
		</p>
	</div>
	<div class="panel-body">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
        <p>
            <?php /* echo Html::a('Create Uebungsgruppe', ['create'], ['class' => 'btn btn-success'])*/  ?>
        </p>
          	<?php
        
        Pjax::begin();
        echo ListView::widget([
            'id' => 'benutzerlist',
            'dataProvider' => $dataProvider,
            'itemView' => '_teilnahmerlist',
            'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
            'itemOptions' => [
                'tag' => 'div',
                'class' => 'col-md-1'
            ],
            // 'layout' => '{items} {pager}',
            'pager' => [
                'maxButtonCount' => 10,
                'nextPageLabel' => Yii::t('app', 'nächste'),
                'prevPageLabel' => Yii::t('app', 'vorne')
            ]
        ]);
        Pjax::end()?>
	</div>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">
		<p>
			<b><h4>Alle Abgabe:</b>
		</p>
	</div>
	<div class="panel-body">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
        <p>
            <?php /* echo Html::a('Create Uebungsgruppe', ['create'], ['class' => 'btn btn-success'])*/  ?>
        </p>
          	<?php
        
        Pjax::begin();
        echo ListView::widget([
            'id' => 'benutzerlist',
            'dataProvider' => $dataProvider1,
            'itemView' => '_abgabeblaetterlist',
            'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
            'itemOptions' => [
                'tag' => 'div',
                'class' => 'col-md-1'
            ],
            // 'layout' => '{items} {pager}',
            'pager' => [
                'maxButtonCount' => 10,
                'nextPageLabel' => Yii::t('app', 'nächste'),
                'prevPageLabel' => Yii::t('app', 'vorne')
            ]
        ]);
        Pjax::end()?>
	</div>
</div>



