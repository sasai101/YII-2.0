<?php

namespace backend\controllers;

use Yii;
use common\models\Uebungsgruppe;
use common\models\UebungsgruppeSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\UebungSuchen;
use common\models\BenutzerTeilnimmtUebungsgruppeSuchen;
use common\models\Uebungsblaetter;
use common\models\Uebung;
use common\models\Abgabe;
use common\models\Benutzer;
use common\models\Korrektor;
use common\models\Tutor;

/**
 * UebungsgruppeController implements the CRUD actions for Uebungsgruppe model.
 */
class UebungsgruppeController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Finds the Uebungsgruppe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Uebungsgruppe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Uebungsgruppe::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    /*
     * Zeigen die entsprechende Übungsguppe mit Tutorprofiefoto
     */
    public function actionAlleuebungsgruppe($id) 
    {
        if(Korrektor::findOne(Yii::$app->user->identity->MarterikelNr)!=null){
            //tablle uebungsgruppe
            $model = Uebung::findOne($id);
            $searchModel = new UebungsgruppeSuchen();
            $dateProvider = $searchModel->searchalleGruppeVonKorrektor(Yii::$app->request->getQueryParams(),$id,Yii::$app->user->identity->MarterikelNr);
            
            return $this->render('alleuebungsgruppe',[
                'dataProvider' => $dateProvider,
                'searchModel' => $searchModel,
                'model' => $model,
            ]);
            
        }else if(Tutor::findOne(Yii::$app->user->identity->MarterikelNr)!=null){
            
            //tablle uebungsgruppe
            $model = Uebung::findOne($id);
            $searchModel = new UebungsgruppeSuchen();
            $dateProvider = $searchModel->searchalleGruppeVonTutor(Yii::$app->request->getQueryParams(),$id,Yii::$app->user->identity->MarterikelNr);
            
            return $this->render('alleuebungsgruppe',[
                'dataProvider' => $dateProvider,
                'searchModel' => $searchModel,
                'model' => $model,
            ]);
            
        }else{
            //tablle uebungsgruppe
            $model = Uebung::findOne($id);
            $searchModel = new UebungsgruppeSuchen();
            $dateProvider = $searchModel->searchGruppe($id);
            
            return $this->render('alleuebungsgruppe',[
                'dataProvider' => $dateProvider,
                'searchModel' => $searchModel,
                'model' => $model,
            ]);
        }
    }
    
    /*
     * Zeigen die Ausführlichkeit von eine Gruppe
     */
    public function actionGruppendetails($id) 
    {
        
        //Tabelle benutzerTeilnimmtUebungsgruppen
        $searchModel = new BenutzerTeilnimmtUebungsgruppeSuchen();
        $dataProvider = $searchModel->searchAlleBenutzer($id);
        
//         echo "<pre>";
//         print_r($dataProvider);
//         echo "</pre>";
//         exit(0);
        
        
        //Tabelle uebungsblaetter
        $searchModel1 = new UebungsgruppeSuchen();
        $dataProvider1 = $searchModel1->searchUbungsblaetter($id);
        
        // UeubungsgruppeID zu Übungsblätter weiterleiten   
        $modelUebungsgruppe = $this->findModel($id);
        
        return $this->render('gruppendetails',[
            //für alle Teilenahmer
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            //für Übungsblätter
            'dataProvider1' => $dataProvider1,
            'searchModel1' => $searchModel1,
            // Übungsgruppe
            'modelUebungsgruppe' => $modelUebungsgruppe,
        ]);
    }
    
    /*
     *  Echart Action von Gruppe (mitarbeiter/view ->gruppenlistview)
     */
    public function actionUebungsgruppebarecharts($uebungsgruppeID) {
        
         $model = Uebungsgruppe::findOne($uebungsgruppeID);
         
         return $this->render('uebungsgruppebarecharts',[
             'model'=>$model,
         ]);
    }
    
    /*
     *  Echart Acction von Gruppe per Übungsblätter (Totur/view ->gruppenblaetterlistview)
     */
    
    public function actionUebungsgruppepiebarecharts($uebungsblaetterID,$uebungsgruppeID) {
        
        $model = Uebungsgruppe::findOne($uebungsgruppeID);
        $modelBlaetter = Uebungsblaetter::findOne($uebungsblaetterID);
        
        return $this->render('uebungsgruppepiebarecharts',[
            'model' => $model,
            'modelBlaetter' => $modelBlaetter
        ]);
    }
    
    /*
     * Person Echarts , da kann man alle Abgabedetails von bestimmtem Person in bestimmtem Gruppe einsehen
     */
    public function actionPersonecharts($marterikelNr, $uebungsgruppeID) {
        $model = Abgabe::find()->where(['Benutzer_MarterikelNr'=>$marterikelNr,'UebungsgruppenID'=>$uebungsgruppeID])->all();
        $modelBenutzer = Benutzer::findOne($marterikelNr);
        $modelUebungsgruppe = Uebungsgruppe::findOne($uebungsgruppeID);
        
        return $this->render('personecharts',[
            'model' => $model,
            'modelBenutzer'=>$modelBenutzer,
            'modelUebungsgruppe' => $modelUebungsgruppe,
        ]);
    }
    
    /*
     *  Echart Action von Uebungs (Uebungsgruppe/alleuebungsgruppe)
     */
    public function actionUebungsnoteverteilung($uebungsID) {
        
        $model = Uebung::findOne($uebungsID);
        
        return $this->render('uebungsnoteverteilung',[
            'model'=>$model,
        ]);
    }
    
}
