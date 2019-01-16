<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uebungsgruppes';
?>
<div class="uebungsgruppe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'UebungsgruppeID',
            'UebungsID',
            'Tutor_MarterikelNr',
            'Anzahl_der_Personen',
            'GruppenNr',
            //'Max_Person',
            //'Korrektor_MarterikelNr',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
