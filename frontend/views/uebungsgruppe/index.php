<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\BenutzerTeilnimmtUebungsgruppe;
use common\models\Uebung;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uebungsgruppes';
?>

<?php $uebung = Uebung::findOne($modelUebung->UebungsID)?>
<?php if($uebung->uebungsblaetters ==null):?>
    <?php if(BenutzerTeilnimmtUebungsgruppe::BenutzerMeldungStatus($modelUebung->UebungsID, Yii::$app->user->identity->MarterikelNr) == 1):?>
    <div class="uebungsgruppe-index">
    
        <h1><?= Html::encode($this->title) ?></h1>
    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
    
                //'UebungsgruppeID',
                [
                    'attribute'=>'UebungsgruppeID',
                    'label'=>'Übungsgruppe',
                    'value'=>function ($model) {
                        return "Übungsgruppe ".$model->GruppenNr;
                    }
                ],
                [
                    'attribute'=>'Tutor_MarterikelNr',
                    'label'=>'Tutor',
                    'value'=>function ($model) {
                        return $model->tutorMarterikelNr->marterikelNr->Vorname." ".$model->tutorMarterikelNr->marterikelNr->Nachname;
                    }
                ],
                [
                    'attribute'=>'Korrektor_MarterikelNr',
                    'label'=>'Korrektor',
                    'value'=>function ($model) {
                    return $model->korrektorMarterikelNr->marterikelNr->Vorname." ".$model->korrektorMarterikelNr->marterikelNr->Nachname;
                    }
                ],
                
                [
                    //'attribute'=>'Freie Platz',
                    'label'=>'Max. Person',
                    'value'=>function ($model) {
                        return $model->Max_Person;
                    }
                ],
                    
                [
                    //'attribute'=>'Freie Platz',
                    'label'=>'Freie Platz',
                    'value'=>function ($model) {
                        return $model->Max_Person-$model->Anzahl_der_Personen;
                    }
                ],
                
                [
                    //'attribute'=>'Freie Platz',
                    'label'=>'Anmeldung',
                    'format'=>'raw',
                    'value'=>function ($model) {
                        if($model->Anzahl_der_Personen <= $model->Max_Person){
                            return  Html::a('anmelden',['anmelden','id'=>$model->UebungsgruppeID,'marterikelNr'=>Yii::$app->user->identity->MarterikelNr],['data-confirm'=>Yii::t('yii','Melden Sie an der Übungsgruppe '.$model->GruppenNr.'?')]);
                        }else{
                            return "Keine Plätze";
                        }
                    }
                ],
                //'Max_Person',
                //'Korrektor_MarterikelNr',
    
                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php endif;?>
    
    <?php if(BenutzerTeilnimmtUebungsgruppe::BenutzerMeldungStatus($modelUebung->UebungsID, Yii::$app->user->identity->MarterikelNr) == 0):?>
    	<div>
    		<div>
    			<h4> Sie haben schon angemeldet</h4>
    		</div>
    	</div>
    <?php endif;?>
<?php endif;?>

<?php if($uebung->uebungsblaetters !=null):?>
<div>
	<div>
		<h4> Die Anmeldungszeit ist vorbei</h4>
	</div>
</div>
<?php endif;?>