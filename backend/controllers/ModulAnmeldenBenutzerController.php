<?php

namespace backend\controllers;

use Yii;
use common\models\ModulAnmeldenBenutzer;
use common\models\ModulAnmeldenBenutzerSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ModulAnmeldenBenutzerController implements the CRUD actions for ModulAnmeldenBenutzer model.
 */
class ModulAnmeldenBenutzerController extends Controller
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
     * Lists all ModulAnmeldenBenutzer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ModulAnmeldenBenutzerSuchen;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single ModulAnmeldenBenutzer model.
     * @param integer $ModulID
     * @param integer $Benutzer_MarterikelNr
     * @return mixed
     */
    public function actionView($ModulID, $Benutzer_MarterikelNr)
    {
        $model = $this->findModel($ModulID, $Benutzer_MarterikelNr);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ModulID]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new ModulAnmeldenBenutzer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ModulAnmeldenBenutzer;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ModulID' => $model->ModulID, 'Benutzer_MarterikelNr' => $model->Benutzer_MarterikelNr]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ModulAnmeldenBenutzer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ModulID
     * @param integer $Benutzer_MarterikelNr
     * @return mixed
     */
    public function actionUpdate($ModulID, $Benutzer_MarterikelNr)
    {
        $model = $this->findModel($ModulID, $Benutzer_MarterikelNr);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ModulID' => $model->ModulID, 'Benutzer_MarterikelNr' => $model->Benutzer_MarterikelNr]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ModulAnmeldenBenutzer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ModulID
     * @param integer $Benutzer_MarterikelNr
     * @return mixed
     */
    public function actionDelete($ModulID, $Benutzer_MarterikelNr)
    {
        $this->findModel($ModulID, $Benutzer_MarterikelNr)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ModulAnmeldenBenutzer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ModulID
     * @param integer $Benutzer_MarterikelNr
     * @return ModulAnmeldenBenutzer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ModulID, $Benutzer_MarterikelNr)
    {
        if (($model = ModulAnmeldenBenutzer::findOne(['ModulID' => $ModulID, 'Benutzer_MarterikelNr' => $Benutzer_MarterikelNr])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
