<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Klausurs';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="klausur-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Klausurnote', ['klausurnote'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'KlausurID',
            [
                'label'=>'Modul',
                'value'=>function ($model) {
                    return $model->klausur->modul->Bezeichnung;
                }
            ],
            [
                'label'=>'Klausur',
                'value'=>function ($model) {
                    return $model->klausur->Bezeichnung;
                }
            ],
            [
                'label'=>'Prüfungsdatum',
                'value'=>function ($model) {
                    return $model->klausur->Pruefungsdatum;
                }
            ],
            
            [
                'label'=>'Verbleibenden Tag',
                'value'=>function ($model) {
                    $heute=date("Y-m-d H:i:s");
                    $d1 = strtotime($model->klausur->Pruefungsdatum);
                    $d2 = strtotime($heute);
                    $tage = ceil(abs($d2 - $d1)/86400);  
                    return "noch ".$tage." Tage";
                }
            ],
            //'Mitarbeiter_MarterikelNr',
            //'ModulID',
            //'Kreditpunkt',
            //'Pruefungsdatum',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
