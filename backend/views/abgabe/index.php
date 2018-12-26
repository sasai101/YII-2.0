<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\AbgabeSuchen $searchModel
 */

$this->title = 'Abgabes';
$this->params['breadcrumbs'][] = ['label' => 'Alle Übungen', 'url' => ['uebungsgruppe/alleuebungen']];
$this->params['breadcrumbs'][] = ['label' => 'Alle Übungsgruppen', 'url' => ['uebungsgruppe/alleuebungsgruppe','id'=>$modelUbungsgruppe->UebungsID]];
$this->params['breadcrumbs'][] = ['label' => 'Übungsgruppe'.$modelUbungsgruppe->GruppenNr, 'url'=>['uebungsgruppe/gruppendetails', 'id'=>$modelUbungsgruppe->UebungsgruppeID]];
$this->params['breadcrumbs'][] = 'Übungsblatt '.$modelUebungsblaetter->UebungsNr;
?>

<?php Pjax::begin();?>
<div class="abgabe-index">
    <!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<div>
		<h2>
			Modul: <?php echo $modelUbungsgruppe->uebungs->modul->Bezeichnung ?>
		</h2>
	</div>
	
	<div>
		<h2>
			Übungsgruppe: <?php echo $modelUbungsgruppe->GruppenNr ?>
		</h2>
	</div>
	<!-- Titel -->
	<div>
		<h2>
			Übungsblatt <?php echo $modelUebungsblaetter->UebungsNr ?>
		</h2>
	</div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>	
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Abgabe', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'AbgabeID',
            //'Benutzer_MarterikelNr',
            [
                'attribute'=> 'Benutzer_MarterikelNr',
                'contentOptions' => ['width'=>'100px']
            ],
            
            [
                'attribute'=>'benutzerMarterikelNr',
                'label'=>'Benutzername',
                'value'=>function ($model) {
                    return $model->benutzerMarterikelNr->Vorname." ".$model->benutzerMarterikelNr->Nachname;
                }
            ],
            //'Korrektor_MarterikelNr',
           
            [
                'attribute'=>'AbgabeZeit',
                'format'=>['date','php:d-m-Y H:i:s'],
            ],
            //'AbgabeZeit',
            
            'GesamtePunkt',  
            ///'KorregierteZeit',
            [
                'attribute'=>'KorregierteZeit',
                'format'=>['date','php:d-m-Y H:i:s'],
            ],
            
            [
                'attribute'=>'Korrektor_MarterikelNr',
                'value'=>function ($model) {
                return $model->korrektorMarterikelNr->marterikelNr->Vorname." ".$model->korrektorMarterikelNr->marterikelNr->Vorname;
                }
            ],
            //Übungsblätter runterladen
            [
                'attribute'=>'uebungsblaetterID',
                'format'=>'raw',
                'value'=>function ($model) {
                //return "Übungsblatt ".$model->uebungsblaetter->UebungsNr;
                //Download problem
                return Html::a("Übungsblatt ".$model->uebungsblaetter->UebungsNr,['download', 'id'=>$model->uebungsblaetter->UebungsblatterID]);
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl(['abgabe/update', 'id' => $model->AbgabeID, 'edit' => 't']),
                            ['title' => Yii::t('yii', 'Edit'),]
                        );
                    }
                ],
            ],
        ],
        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,

        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type' => 'info',
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index', 'UebungsgruppeID'=>$modelUbungsgruppe->UebungsgruppeID, 'UebungsblaetterID'=>$modelUebungsblaetter->UebungsblatterID], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]); Pjax::end(); ?>

</div>
<?php Pjax::end()?>
