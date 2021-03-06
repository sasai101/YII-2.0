<?php

namespace backend\controllers;

use Yii;
use common\models\Klausur;
use common\models\KlausurSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Modul;
use common\models\ModulSuchen;
use common\models\Klausurnote;
use yii\widgets\ActiveForm;
use common\models\BenutzerAnmeldenKlausur;
use common\models\Mitarbeiter;
use yii\web\ForbiddenHttpException;
use common\models\Admin;
/**
 * KlausurController implements the CRUD actions for Klausur model.
 */
class KlausurController extends Controller 
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
     * Lists all Klausur models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        //BefugnisTeil
        if(!Yii::$app->user->can('indexKlausurerstellung')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
        $searchModel = new KlausurSuchen;
        $dataProvider = $searchModel->search($id);
        $modelModul = Modul::findOne($id);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'modelModul' => $modelModul,
        ]);
    }

    /**
     * Displays a single Klausur model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //BefugnisTeil
        if(!Yii::$app->user->can('viewKlausurerstellung')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
        $model = $this->findModel($id);
        
        /*if(Yii::$app->request->isAjax && $model->load($_POST)){
            \Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }*/

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->KlausurID]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new Klausur model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        //BefugnisTeil
        if(!Yii::$app->user->can('createKlausurerstellung')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
        $model = new Klausur;
        
        //Einlogger
        $model->Mitarbeiter_MarterikelNr = Yii::$app->user->identity->MarterikelNr;
        //ModulID
        $model->ModulID = $id;
        
        if(Yii::$app->request->isAjax && $model->load($_POST)){
            \Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->KlausurID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Klausur model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //BefugnisTeil
        if(!Yii::$app->user->can('updateKlausurerstellung')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
        $model = $this->findModel($id);
        
        if(Yii::$app->request->isAjax && $model->load($_POST)){
            \Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->KlausurID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Klausur model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //BefugnisTeil
        if(!Yii::$app->user->can('deleteKlausurerstellung')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
        $indexID = $this->findModel($id)->modul->ModulID;
        
        //finde alle Klausurnote unter diesen Klausur 
        $model = Klausurnote::find()->where(['KlausurID'=>$id])->all();
        foreach ($model as $klausurnote){
            $klausurnote->delete();
        }
        $modelAnmeldung = BenutzerAnmeldenKlausur::find()->where(['KlausurID'=>$id])->all();
        foreach ($modelAnmeldung as $anmeldung){
            $anmeldung->delete();
        }
        
        $this->findModel($id)->delete();

        return $this->redirect(['index','id'=>$indexID]);
    }

    /**
     * Finds the Klausur model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Klausur the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Klausur::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /*
     *  Klausur listview Controller
     */
    public function actionKlausurlistview() {
        
        //BefugnisTeil
        if(!Yii::$app->user->can('listviewKlausurerstellung')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
        $searchModel = new ModulSuchen;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        
        return $this->render('klausurlistview', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
    
    /*
     * echarts Klausur, mitarbeiter/view->_klausurlistview
     */
    public function actionEchartsbarklausur($id) {
        
        $model = $this->findModel($id);
        
        /*if(Yii::$app->request->isAjax && $model->load($_POST)){
            \Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }*/
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['echartsbarklausur', 'id' => $model->KlausurID]);
        } else {
            return $this->render('echartsbarklausur',[
                'model' => $model
            ]);
        }
    }
    
    /*
     * 
     */
    public function actionIndexklausur() {
        
        if(Admin::findOne(Yii::$app->user->identity->MarterikelNr)!=null){
            $searchModel = new KlausurSuchen;
            $dataProvider = $searchModel->searchAlle(Yii::$app->request->getQueryParams());
            
            return $this->render('indexklausur', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
        }else{
            if(Mitarbeiter::findOne(Yii::$app->user->identity->MarterikelNr)!=null){
                $searchModel = new KlausurSuchen;
                $dataProvider = $searchModel->searchMitMitarbeiter(Yii::$app->request->getQueryParams(),Yii::$app->user->identity->MarterikelNr);
                
                return $this->render('indexklausur', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]);
            } else{
                $searchModel = new KlausurSuchen;
                $dataProvider = $searchModel->searchAlle(Yii::$app->request->getQueryParams());
                
                return $this->render('indexklausur', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]);
            }
        }
    }
    
    public function actionKlausurdetails($id)
    {
        $KlausurID  = $id;
        return $this->renderAjax('klausurdetails',[
            'KlausurID' => $KlausurID,
        ]);
    }
}
