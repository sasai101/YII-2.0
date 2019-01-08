<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Uebungsgruppe;
use common\models\UebungsblaetterSuchen;
use common\models\Uebung;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UebungSuchen */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uebungs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uebung-index">

	<?php foreach (Uebungsgruppe::AlleTeilnahmGruppe(Yii::$app->user->identity->MarterikelNr) as $uebung):?>
	<?php $modelUeubng = Uebungsgruppe::findOne($uebung)?>
	<div><br/></div>
    <div class="panel panel-primary">
        <div class="panel-body">
			<div><br/></div>
            <h3>Modul: <b><?= $modelUeubng->uebungs->modul->Bezeichnung ?></b></h3>
            <h5>Totur: <b><?= $modelUeubng->tutorMarterikelNr->marterikelNr->Vorname." ".$modelUeubng->tutorMarterikelNr->marterikelNr->Nachname?></b></h5>
            <h5>Übungsgruppe: <b><?= $modelUeubng->GruppenNr?></b></h5>
            <?php $searchModel = new UebungsblaetterSuchen();
                  $dataProvider = $searchModel->searchMitID($modelUeubng->UebungsID);
            ?>
        	
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
        
                    //'UebungsID',
                    [
                        'attribute'=>'UebungsNr',
                        'value'=>function($model) {
                            return "Übungsblatt".$model->UebungsNr;
                        }
                    ],
                    [
                        'label'=>'Übung',
                        'value'=>function ($model) {
                            return $model->uebungs->Bezeichnung;
                        }
                    ],
                    [
                        'attribute'=>'Ausgabedatum',
                        'format'=>['date','php:d-m-Y H:i:s'],
                    ],
                    
                    [
                        'attribute'=>'Deadline',
                        'label'=>'Abgabe bis ',
                        'format'=>['date','php:d-m-Y H:i:s'],
                    ],
                    [
                        'label'=>'Status',
                        'value'=>function($model) {
                            $heute = date('d.m.Y H:i:s');
                            $dethdatum = date($model->Deadline);
                            if(strtotime($dethdatum) > strtotime($heute)){
                                return "abgeben";
                            }else{
                                return "korregieren";
                            }
                        }
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
    <?php endforeach;?>
</div>