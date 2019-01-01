<?php

namespace backend\controllers;

use Yii;
use common\models\Uebungsgruppe;
use common\models\UebungsgruppeSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\UebungSuchen;
use common\models\BenutzerTeilnimmtUebungsgruppe;
use common\models\BenutzerTeilnimmtUebungsgruppeSuchen;
use common\models\Uebungsblaetter;
use common\models\UebungsblaetterSuchen;

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
     * Aller Übungen als Image anzeigen unter Verzeichnis Übung->Übungsgruppe
     */
    public function actionAlleuebungen()
    {
        //tabelle uebung
        $searchModel = new UebungSuchen();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        
        return $this->render('alleuebungen', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
    
    /*
     * Zeigen die entsprechende Übungsguppe mit Tutorprofiefoto
     */
    public function actionAlleuebungsgruppe($id) 
    {
        //tablle uebungsgruppe
        $searchModel = new UebungsgruppeSuchen();
        $dateProvider = $searchModel->searchGruppe($id);
        
        return $this->render('alleuebungsgruppe',[
            'dataProvider' => $dateProvider,
            'searchModel' => $searchModel,
        ]);
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
    
    
    
    
    
    
    
    
    
    
    
    
    
}
