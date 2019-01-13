<?php

namespace backend\controllers;

use Yii;
use common\models\Admin;
use common\models\BenutzerAnmeldenKlausur;
use common\models\BenutzerAnmeldenKlausurSuchen;
use common\models\Klausur;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;
use yii\filters\VerbFilter;
use common\models\KlausurSuchen;
use common\models\Mitarbeiter;

/**
 * BenutzerAnmeldenKlausurController implements the CRUD actions for BenutzerAnmeldenKlausur model.
 */
class BenutzerAnmeldenKlausurController extends Controller
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
     * Lists all BenutzerAnmeldenKlausur models. 
     * @return mixed
     */
    public function actionIndex($id)
    {
        BenutzerAnmeldenKlausur::Klausuranmeldung($id);
        
        $modelKlausur = Klausur::findOne($id);
        $searchModel = new BenutzerAnmeldenKlausurSuchen;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'modelKlausur' => $modelKlausur,
        ]);
    }

    /**
     * Creates a new BenutzerAnmeldenKlausur model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new BenutzerAnmeldenKlausur;
        $model->KlausurID = $id;
        $model->Anmeldungszeit = time();
        
        if(Yii::$app->request->isAjax && $model->load($_POST)){
            \Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Benutzer_MarterikelNr' => $model->Benutzer_MarterikelNr, 'KlausurID' => $model->KlausurID]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    

    /**
     * Deletes an existing BenutzerAnmeldenKlausur model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Benutzer_MarterikelNr
     * @param integer $KlausurID
     * @return mixed
     */
    public function actionDelete($Benutzer_MarterikelNr, $KlausurID)
    {
        $this->findModel($Benutzer_MarterikelNr, $KlausurID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BenutzerAnmeldenKlausur model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Benutzer_MarterikelNr
     * @param integer $KlausurID
     * @return BenutzerAnmeldenKlausur the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Benutzer_MarterikelNr, $KlausurID)
    {
        if (($model = BenutzerAnmeldenKlausur::findOne(['Benutzer_MarterikelNr' => $Benutzer_MarterikelNr, 'KlausurID' => $KlausurID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /*
     *  KlausurAnmeldung Listview Controller
     */
    public function actionKlausuranmeldunglistview() {
        
        if(Admin::findOne(Yii::$app->user->identity->MarterikelNr)!=null){
            $searchModel = new KlausurSuchen;
            $dataProvider = $searchModel->searchAlle(Yii::$app->request->getQueryParams());
            
            return $this->render('klausuranmeldunglistview', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
        }else{
            if(Mitarbeiter::findOne(Yii::$app->user->identity->MarterikelNr)!=null){
                
                $searchModel = new KlausurSuchen;
                $dataProvider = $searchModel->searchMitMitarbeiter(Yii::$app->request->getQueryParams(), Yii::$app->user->identity->MarterikelNr);
                
                return $this->render('klausuranmeldunglistview', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]);
                
            }else {
                $searchModel = new KlausurSuchen;
                $dataProvider = $searchModel->searchAlle(Yii::$app->request->getQueryParams());
                
                return $this->render('klausuranmeldunglistview', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]);
            }
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
                $dataProvider = $searchModel->searchMitMitarbeiter(Yii::$app->request->getQueryParams(), Yii::$app->user->identity->MarterikelNr);
                
                return $this->render('indexklausur', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]);
                
            }else {
                $searchModel = new KlausurSuchen;
                $dataProvider = $searchModel->searchAlle(Yii::$app->request->getQueryParams());
                
                return $this->render('indexklausur', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]);
            }
        }
    }
}
