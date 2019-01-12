<?php

namespace backend\controllers;

use Yii;
use common\models\Klausurnote;
use common\models\KlausurnoteSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\bootstrap\ActiveForm;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use common\models\Benutzer;
use common\models\KlausurSuchen;
use common\models\Klausur;

/**
 * KlausurnoteController implements the CRUD actions for Klausurnote model.
 */
class KlausurnoteController extends Controller
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
     * Lists all Klausurnote models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $modelKlausur = Klausur::findOne($id);
        $searchModel = new KlausurnoteSuchen;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        
        if (Yii::$app->request->post('hasEditable')) {
            $klausurnoteID = Yii::$app->request->post('editableKey');
            $klausurnote = Klausurnote::findOne($klausurnoteID);
            
            $out = Json::encode(['output'=>'','message'=>'']);
            $post = [];
            $posted = current($_POST['Klausurnote']);
            $post['Klausurnote'] = $posted;
            
            if($klausurnote->load($post)){
                $klausurnote->save();
            }
            echo $out;
            return ;
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'modelKlausur' => $modelKlausur,
        ]);
    }

    /**
     * Displays a single Klausurnote model.
     * @param integer $id
     * @return mixed
     */
    /*public function actionView($id)
    {
        $model = $this->findModel($id);
        
        if(Yii::$app->request->isAjax && $model->load($_POST)){
            \Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->KlausurnoteID]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }*/

    /**
     * Creates a new Klausurnote model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Klausurnote;
        
        if(Yii::$app->request->isAjax && $model->load($_POST)){
            \Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
        //Korrektor
        $model->Mitarbeiter_MarterikelNr = Yii::$app->user->identity->MarterikelNr;
        
        //Klausur ID
        $model->KlausurID = $id;
        
        
        //Klausurnote automatisch ausfüllen

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model
            ]);
        }
    }

    /**
     * Updates an existing Klausurnote model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        
        if(Yii::$app->request->isAjax && $model->load($_POST)){
            \Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->KlausurID]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Klausurnote model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $klausurID = $model->KlausurID;
        $this->findModel($id)->delete();

        return $this->redirect(['index','id'=>$klausurID]);
    }

    /**
     * Finds the Klausurnote model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Klausurnote the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Klausurnote::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /*
     *  Klausurnote Listview Controller
     */
    public function actionKlausurnotelistview() {
        
        $searchModel = new KlausurSuchen;
        $dataProvider = $searchModel->searchAlle(Yii::$app->request->getQueryParams());
        
        return $this->render('klausurnotelistview', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
    
    /*
     * Klausurnote PieCharts für klausurnote/echartspieKlausurnote, von Benutzer/view/_klausurlistview
     */
    public function actionEchartspieklausurnote($klausurnoteID, $marterikelNr) {
        
        $modelKlausurnote = Klausurnote::findOne($klausurnoteID);
        $modelBenutzer = Benutzer::findOne($marterikelNr);
        
        return $this->render('echartspieklausurnote',[
            'modelKlausurnote'=>$modelKlausurnote,
            'modelBenutzer'=>$modelBenutzer,
        ]);
    }
    
    /*
     *
     */
    public function actionIndexklausur() {
        $searchModel = new KlausurSuchen;
        $dataProvider = $searchModel->searchAlle(Yii::$app->request->getQueryParams());
        
        return $this->render('indexklausur', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
    
}
