<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\BenutzerAnmeldenKlausurSuchen $searchModel
 */

//$this->title = 'Modul '.$modelModul->Bezeichnung;
$this->params['breadcrumbs'][] = ['label' => 'Alle Klausur', 'url' => ['benutzer-anmelden-klausur/klausuranmeldunglistview']];
$this->params['breadcrumbs'][] = HtmlPurifier::process(mb_substr($modelKlausur->Bezeichnung, 0, 15).'......');
?>
<div class="klausurnote-index">

	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	
	<!-- Titel -->
	<div>
		<h3>
			<?php echo $modelKlausur->Bezeichnung?> :</br></br>
			<?= Html::encode($modelKlausur->modul->Bezeichnung); ?>
		</h3>
	</div>
	
	<!-- Leere Zeile -->
	<div class="row"></br></div>
	<!-- Leere Zeile -->
	<div class="row"></br></div>	
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Benutzer Anmelden Klausur', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Benutzer_MarterikelNr',
            [
                'attribute'=>'Benutzer_MarterikelNr',
                'contentOptions' => ['width'=>'100px']
            ],
            [
                'attribute'=>'benutzerMarterikelNr',
                'label'=>'Prüfername',
                'value'=> function ($model) {
                return $model->benutzerMarterikelNr->Vorname." ".$model->benutzerMarterikelNr->Nachname;
                }
            ],
            //'KlausurID',
            [
                'attribute'=>'KlausurID',
                'value'=>function ($model) {
                    return $model->klausur->Bezeichnung;
                }
            ],
            //'Anmeldungszeit',
            [
                'attribute'=>'Anmeldungszeit',
                'format'=>['date','php:d-m-Y H:i:s'],
            ],
            //'Anmeldungsstatus',
            [
                'attribute'=>'klausur',
                'label'=>'Modul',
                'value'=>function ($model) {
                    return $model->klausur->modul->Bezeichnung;
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl(['benutzer-anmelden-klausur/view', 'Benutzer_MarterikelNr' => $model->Benutzer_MarterikelNr, 'KlausurID' => $model->KlausurID, 'edit' => 't']),
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
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create', 'id'=>$modelKlausur->KlausurID], ['class' => 'btn btn-success modalButton']),
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index', 'id'=>$modelKlausur->KlausurID], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]); Pjax::end(); ?>

</div>
