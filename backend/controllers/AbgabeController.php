<?php

namespace backend\controllers;

use Yii;
use common\models\Abgabe;
use common\models\AbgabeSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Uebungsgruppe;
use common\models\Uebungsblaetter;
use yii\base\Model;
use common\models\Benutzer;
use common\models\Uebung;
use yii\web\ForbiddenHttpException;

/**
 * AbgabeController implements the CRUD actions for Abgabe model.
 */
class AbgabeController extends Controller
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
     * Lists all Abgabe models.
     * @return mixed
     */
    public function actionIndex($UebungsgruppeID, $UebungsblaetterID)
    {
        $searchModel = new AbgabeSuchen;
        $dataProvider = $searchModel->searchAlsGruppe(Yii::$app->request->getQueryParams(),$UebungsgruppeID, $UebungsblaetterID);
        $modelUbungsgruppe = Uebungsgruppe::findOne($UebungsgruppeID);
        $modelUebungsblaetter = Uebungsblaetter::findOne($UebungsblaetterID);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'modelUbungsgruppe' => $modelUbungsgruppe,
            'modelUebungsblaetter' => $modelUebungsblaetter,
        ]);
    }

    /**
     * Updates an existing Abgabe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //BefugnisTeil
        if(!Yii::$app->user->can('korregierenAbgabe')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
        $model = $this->findModel($id);
        $modelEinzelaufgabe =$model->einzelaufgabes;
        
        if(Model::loadMultiple($modelEinzelaufgabe, Yii::$app->request->post()))
        {
            foreach ($modelEinzelaufgabe as $aufgabe)
            {
                $aufgabe->save(false);
            }
            $model->save();
            return $this->redirect(['index','UebungsgruppeID'=>$model->UebungsgruppenID, 'UebungsblaetterID'=>$model->UebungsblaetterID]);
        }
            
        return $this->render('update', [
            'model' => $model,
        ]);
        
    }
    
    /*
     * View action
     */
    public function actionView($id) {
        
        //BefugnisTeil
        if(!Yii::$app->user->can('einsehenAbgabe')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MarterikelNr]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }
    /**
     * Finds the Abgabe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Abgabe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Abgabe::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    /*
     * Runterladen
     */
    public function actionDownload($id){
        $model = Uebungsblaetter::findOne($id);
        if(file_exists($model->Datein)){
            Yii::$app->response->sendFile($model->Datein);
        }
    }
    
    /*
     * Runterladen
     */
    public function actionDownloadantwort($id){
        $model = Abgabe::findOne($id);
        if(file_exists($model->Datein)){
            Yii::$app->response->sendFile($model->Datein);
        }
    }
    
    /*
     * Einzeln Abgabeecharts für benutzer/notelistview
     */
    public function actionEchartsabgabe($uebungsID, $marterikelNr) {
        
        $model = Abgabe::alleAbgabe($uebungsID, $marterikelNr);
        $modelBenutzer = Benutzer::findOne($marterikelNr);
        $modelUebung = Uebung::findOne($uebungsID);
        
        return $this->render('echartsabgabe',[
            'model'=>$model,
            'modelBenutzer'=>$modelBenutzer,
            'modelUebung' => $modelUebung
        ]);
    }
}
