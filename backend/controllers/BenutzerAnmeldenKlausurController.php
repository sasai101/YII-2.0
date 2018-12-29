<?php

namespace backend\controllers;

use Yii;
use common\models\BenutzerAnmeldenKlausur;
use common\models\BenutzerAnmeldenKlausurSuchen;
use common\models\Klausur;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\KlausurSuchen;

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
     * Displays a single BenutzerAnmeldenKlausur model.
     * @param integer $Benutzer_MarterikelNr
     * @param integer $KlausurID
     * @return mixed
     */
    public function actionView($Benutzer_MarterikelNr, $KlausurID)
    {
        $model = $this->findModel($Benutzer_MarterikelNr, $KlausurID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Benutzer_MarterikelNr]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new BenutzerAnmeldenKlausur model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BenutzerAnmeldenKlausur;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Benutzer_MarterikelNr' => $model->Benutzer_MarterikelNr, 'KlausurID' => $model->KlausurID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BenutzerAnmeldenKlausur model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Benutzer_MarterikelNr
     * @param integer $KlausurID
     * @return mixed
     */
    public function actionUpdate($Benutzer_MarterikelNr, $KlausurID)
    {
        $model = $this->findModel($Benutzer_MarterikelNr, $KlausurID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Benutzer_MarterikelNr' => $model->Benutzer_MarterikelNr, 'KlausurID' => $model->KlausurID]);
        } else {
            return $this->render('update', [
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
        
        $searchModel = new KlausurSuchen;
        $dataProvider = $searchModel->searchAlle(Yii::$app->request->getQueryParams());
        
        return $this->render('klausuranmeldunglistview', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
}
