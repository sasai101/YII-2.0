<?php

namespace backend\controllers;

use Yii;
use common\models\Uebung;
use common\models\UebungSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Mitarbeiter;
use common\models\Admin;
use yii\web\ForbiddenHttpException;
/**
 * UebungController implements the CRUD actions for Uebung model.
 */
class UebungController extends Controller
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
     * Lists all Uebung models.
     * @return mixed
     */
    public function actionIndex()
    {
        //BefugnisTeil
        if(!Yii::$app->user->can('indexUebungsblaetter')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
        if(Admin::findOne(Yii::$app->user->identity->MarterikelNr)!=null){
            $searchModel = new UebungSuchen();
            $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
            
            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
        }else{
            if(Mitarbeiter::findOne(Yii::$app->user->identity->MarterikelNr)!=null){
                $searchModel = new UebungSuchen();
                $dataProvider = $searchModel->searchMitarbeiter(Yii::$app->request->getQueryParams(),Yii::$app->user->identity->MarterikelNr);
                
                return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]);
            }else{
                $searchModel = new UebungSuchen();
                $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
                
                return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]);
            }
        }
    }
    
    /**
     * Lists all Uebung models.
     * @return mixed
     */
    public function actionIndexgruppe()
    {
        if(Admin::findOne(Yii::$app->user->identity->MarterikelNr)!=null){
            $searchModel = new UebungSuchen();
            $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
            
            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
        }else{
            $searchModel = new UebungSuchen();
            $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
            
            return $this->render('indexgruppe', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
        }
    }
    
    /**
     * Displays a single Uebung model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->UebungsID]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Deletes an existing Uebung model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**Ü
     * Finds the Uebung model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Uebung the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Uebung::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /*
     *  Übungsecharts mitarbeiter/view
     */
    public function actionUebungsecharts($uebungsID) {
        $model = Uebung::findOne($uebungsID);
        return $this->render('uebungsecharts',[
            'uebungsID' => $uebungsID,
            'model'=> $model
        ]);
    }
    
    /*
     * Aller Übungen als Image anzeigen unter Verzeichnis Übung->Übungsblätter
     */
    public function actionAlleuebungen()
    {
        //BefugnisTeil
        if(!Yii::$app->user->can('alleUebungUebungsblaetter')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
        if(Admin::findOne(Yii::$app->user->identity->MarterikelNr)!=null){
            $searchModel = new UebungSuchen();
            $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
            
            return $this->render('alleuebungen', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
        }else{
            if(Mitarbeiter::findOne(Yii::$app->user->identity->MarterikelNr)!=null){
                $searchModel = new UebungSuchen();
                $dataProvider = $searchModel->searchMitarbeiter(Yii::$app->request->getQueryParams(),Yii::$app->user->identity->MarterikelNr);
                
                return $this->render('alleuebungen', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]);
            }else{
                $searchModel = new UebungSuchen();
                $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
                
                return $this->render('alleuebungen', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]);
            }
        }        
    }
    
    /*
     * Aller Übungen als Image anzeigen unter Verzeichnis Übung->Übungsgruppe
     */
    public function actionAlleuebungsgruppe()
    {
        if(Admin::findOne(Yii::$app->user->identity->MarterikelNr)!=null){
            $searchModel = new UebungSuchen();
            $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
            
            return $this->render('alleuebungsgruppe', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
        }else{
            /*if(Mitarbeiter::findOne(Yii::$app->user->identity->MarterikelNr)!=null){
                $searchModel = new UebungSuchen();
                $dataProvider = $searchModel->searchMitarbeiter(Yii::$app->request->getQueryParams(),Yii::$app->user->identity->MarterikelNr);
                
                return $this->render('alleuebungsgruppe', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]);
            }else{*/
                $searchModel = new UebungSuchen();
                $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
                
                return $this->render('alleuebungsgruppe', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]);
            //}
        }
    }
}
