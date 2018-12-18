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
use common\models\EinzelaufgabeSuchen;
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
     * Lists all Uebungsgruppe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UebungsgruppeSuchen;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Uebungsgruppe model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->UebungsgruppeID]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new Uebungsgruppe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Uebungsgruppe;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->UebungsgruppeID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Uebungsgruppe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->UebungsgruppeID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Uebungsgruppe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
        $searchModel = new BenutzerTeilnimmtUebungsgruppeSuchen();
        $dataProvider = $searchModel->searchAlleBenutzer($id);
        
        $searchModel1 = new UebungsblaetterSuchen();
        $dataProvider1 = $searchModel1->searchMitID($id);
        
        
        $model = $this->findModel($id);
        
        return $this->render('gruppendetails',[
            //für alle Teilenahmer
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            //für Übungsblätter
            'dataProvider1' => $dataProvider1,
            'searchModel1' => $searchModel1,
            
            'model' => $model,
        ]);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}
