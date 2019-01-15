<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Uebungsgruppe;
use common\models\UebungsblaetterSuchen;
use common\models\Uebung;
use common\models\Abgabe;
use common\models\BenutzerTeilnimmtUebungsgruppe;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UebungSuchen */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uebungs';
//$this->params['breadcrumbs'][] = $this->title;
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
                    //['class' => 'yii\grid\SerialColumn'],
        
                    //'UebungsID',
                    [
                        'attribute'=>'UebungsNr',
                        'contentOptions' => ['width'=>'100px'],
                        'format'=>'raw',
                        'value'=>function ($model) {
                            //return "Übungsblatt ".$model->uebungsblaetter->UebungsNr;
                            return Html::a("Übungsblatt ".$model->UebungsNr,['download', 'id'=>$model->UebungsblatterID]);
                        }
                    ],
                    [
                        'label'=>'Übung',
                        'contentOptions' => ['width'=>'400px'],
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
                        'format'=>'raw',
                        'value'=>function($model) {
                            $heute = date('d.m.Y H:i:s',time()+60*60);
                            $dethdatum = date($model->Deadline);
                            if(strtotime($dethdatum) > strtotime($heute)){
                                $modelAbgabe = Abgabe::find()->where(['UebungsblaetterID'=>$model->UebungsblatterID, 'Benutzer_MarterikelNr'=>Yii::$app->user->identity])->all();
                                foreach ($modelAbgabe as $Abgabe){
                                    return Html::a("abgeben",['abgabe/abgabeabgeben','id'=>$Abgabe->AbgabeID]);
                                }
                            }else{
                                $modelAbgabe = Abgabe::find()->where(['UebungsblaetterID'=>$model->UebungsblatterID, 'Benutzer_MarterikelNr'=>Yii::$app->user->identity])->all();
                                foreach ($modelAbgabe as $Abgabe){
                                    return Html::a("korregieren",['abgabe/view','id'=>$Abgabe->AbgabeID]);
                                }
                            }
                        },
                    ],
                    [
                        'label'=>'Gesamte Punkt',
                        'contentOptions' => ['width'=>'150px'],
                        'value'=>function ($model) {
                            $modelAbgabe = Abgabe::find()->where(['UebungsblaetterID'=>$model->UebungsblatterID, 'Benutzer_MarterikelNr'=>Yii::$app->user->identity])->all();
                            foreach ($modelAbgabe as $Abgabe){
                                if($Abgabe->GesamtePunkt != null){
                                    return "(".$Abgabe->GesamtePunkt."/".$model->GesamtePunkte.")";
                                }else{
                                    return "noch nicht korregiert";
                                }
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
    
    
	<div>
		<?php if(BenutzerTeilnimmtUebungsgruppe::BenutzerPruefen(Yii::$app->user->identity->MarterikelNr) != null):?>
			<div>
				Sie haben an keinem Gruppe teilgenommen.
			</div>
		<?php endif;?>
	</div>
    
</div>
