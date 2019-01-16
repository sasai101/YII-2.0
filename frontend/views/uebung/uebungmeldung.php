<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UebungSuchen */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Übunganmeldung';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uebung-meldung">

	<div><br/></div>
    <div class="panel panel-primary">
        <div class="panel-body">
			<div><br/></div>
            <h3><b>Übungsanmeldung</b></h3>
            <h4><b>Alle Übungen</b></h4>
            
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],
        
                    //'UebungsID',
                    [
                        'attribute'=>'Mitarbeiter_MarterikelNr',
                        'label'=>'Übungsleiter',
                        'contentOptions' => ['width'=>'100px'],
                        'value'=>function ($model) {
                            
                            return $model->mitarbeiterMarterikelNr->marterikelNr->Vorname." ".$model->mitarbeiterMarterikelNr->marterikelNr->Nachname;
                        }
                    ],
                    [
                        'attribute'=>'ModulID',
                        'label'=>'Modul',
                        'contentOptions' => ['width'=>'400px'],
                        'value'=>function ($model) {
                            return $model->modul->Bezeichnung;
                        }
                    ],
                    [
                        'attribute'=>'Uebung',
                        'label'=>'Modul',
                        'contentOptions' => ['width'=>'400px'],
                        'value'=>function ($model) {
                            return $model->Bezeichnung;
                        }
                    ],
                    
                    [
                        'attribute'=>'Zulassungsgrenze',
                        'label'=>'Zulassungsgrenze',
                        'value'=>function ($model) {
                            return $model->Zulassungsgrenze;
                        }
                    ],
                    [
                        'label'=>'Anmdelden',
                        'format'=>'raw',
                        'value'=>function($model) {
                            
                            return Html::a("anmelden",['uebungsgruppe/index','id'=>$model->UebungsID]);
                            
                        },
                    ],
                    //'ModulID',
                    //'Mitarbeiter_MarterikelNr',
                    //'Bezeichnung',
                    //'Zulassungsgrenze',
        
                    //['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            
            
        </div>
    </div>
    <div><br/></div>

</div>
