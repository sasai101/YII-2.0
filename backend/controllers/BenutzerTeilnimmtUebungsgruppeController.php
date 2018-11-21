<?php

namespace backend\controllers;

use Yii;
use common\models\BenutzerTeilnimmtUebungsgruppe;
use common\models\BenutzerTeilnimmtUebungsgruppeSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BenutzerTeilnimmtUebungsgruppeController implements the CRUD actions for BenutzerTeilnimmtUebungsgruppe model.
 */
class BenutzerTeilnimmtUebungsgruppeController extends Controller
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
     * Lists all BenutzerTeilnimmtUebungsgruppe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BenutzerTeilnimmtUebungsgruppeSuchen;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single BenutzerTeilnimmtUebungsgruppe model.
     * @param integer $Benuter_MarterikelNr
     * @param integer $UebungsgruppeID
     * @return mixed
     */
    public function actionView($Benuter_MarterikelNr, $UebungsgruppeID)
    {
        $model = $this->findModel($Benuter_MarterikelNr, $UebungsgruppeID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Benuter_MarterikelNr]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new BenutzerTeilnimmtUebungsgruppe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BenutzerTeilnimmtUebungsgruppe;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Benuter_MarterikelNr' => $model->Benuter_MarterikelNr, 'UebungsgruppeID' => $model->UebungsgruppeID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BenutzerTeilnimmtUebungsgruppe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Benuter_MarterikelNr
     * @param integer $UebungsgruppeID
     * @return mixed
     */
    public function actionUpdate($Benuter_MarterikelNr, $UebungsgruppeID)
    {
        $model = $this->findModel($Benuter_MarterikelNr, $UebungsgruppeID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Benuter_MarterikelNr' => $model->Benuter_MarterikelNr, 'UebungsgruppeID' => $model->UebungsgruppeID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BenutzerTeilnimmtUebungsgruppe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Benuter_MarterikelNr
     * @param integer $UebungsgruppeID
     * @return mixed
     */
    public function actionDelete($Benuter_MarterikelNr, $UebungsgruppeID)
    {
        $this->findModel($Benuter_MarterikelNr, $UebungsgruppeID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BenutzerTeilnimmtUebungsgruppe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Benuter_MarterikelNr
     * @param integer $UebungsgruppeID
     * @return BenutzerTeilnimmtUebungsgruppe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Benuter_MarterikelNr, $UebungsgruppeID)
    {
        if (($model = BenutzerTeilnimmtUebungsgruppe::findOne(['Benuter_MarterikelNr' => $Benuter_MarterikelNr, 'UebungsgruppeID' => $UebungsgruppeID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
