<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = 'Übungsgruppe '.$modelUebungsgruppe->GruppenNr;
$this->params['breadcrumbs'][] = ['label' => 'Alle Übungen', 'url' => ['uebungsgruppe/alleuebungen']];
$this->params['breadcrumbs'][] = ['label' => 'Alle Übungsgruppen', 'url' => ['uebungsgruppe/alleuebungsgruppe','id'=>$modelUebungsgruppe->UebungsID]];
$this->params['breadcrumbs'][] = 'Übungsgruppe '.$modelUebungsgruppe->GruppenNr;
?>

<?php Pjax::begin();?>
<div class="uebungsgruppe">

    <!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<div>
		<h2>
			Modul: <?php echo $modelUebungsgruppe->uebungs->modul->Bezeichnung ?>
		</h2>
	</div>
	
	<!-- Titel -->
	<div>
		<h2>
			Übungsgruppe <?php echo $modelUebungsgruppe->GruppenNr ?>
		</h2>
	</div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>	


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
                'maxButtonCount' => 30,
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
            //weitere Parameter
            'viewParams' => ['modelUebungsgruppe' => $modelUebungsgruppe],
            'itemOptions' => [
                'tag' => 'div',
                'class' => 'col-md-1'
            ],
            // 'layout' => '{items} {pager}',
            'pager' => [
                'maxButtonCount' => 30,
                'nextPageLabel' => Yii::t('app', 'nächste'),
                'prevPageLabel' => Yii::t('app', 'vorne')
            ]
        ]);
        Pjax::end()?>
	</div>
</div>
</div>
<?php Pjax::end();?>



