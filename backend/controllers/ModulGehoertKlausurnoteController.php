<?php

namespace backend\controllers;

use Yii;
use common\models\ModulGehoertKlausurnote;
use common\models\ModulGehoertKlausurnoteSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ModulGehoertKlausurnoteController implements the CRUD actions for ModulGehoertKlausurnote model.
 */
class ModulGehoertKlausurnoteController extends Controller
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
     * Lists all ModulGehoertKlausurnote models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ModulGehoertKlausurnoteSuchen;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single ModulGehoertKlausurnote model.
     * @param integer $Modul_ID
     * @param integer $Klausurnote_ID
     * @return mixed
     */
    public function actionView($Modul_ID, $Klausurnote_ID)
    {
        $model = $this->findModel($Modul_ID, $Klausurnote_ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Modul_ID]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new ModulGehoertKlausurnote model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ModulGehoertKlausurnote;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Modul_ID' => $model->Modul_ID, 'Klausurnote_ID' => $model->Klausurnote_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ModulGehoertKlausurnote model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Modul_ID
     * @param integer $Klausurnote_ID
     * @return mixed
     */
    public function actionUpdate($Modul_ID, $Klausurnote_ID)
    {
        $model = $this->findModel($Modul_ID, $Klausurnote_ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Modul_ID' => $model->Modul_ID, 'Klausurnote_ID' => $model->Klausurnote_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ModulGehoertKlausurnote model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Modul_ID
     * @param integer $Klausurnote_ID
     * @return mixed
     */
    public function actionDelete($Modul_ID, $Klausurnote_ID)
    {
        $this->findModel($Modul_ID, $Klausurnote_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ModulGehoertKlausurnote model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Modul_ID
     * @param integer $Klausurnote_ID
     * @return ModulGehoertKlausurnote the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Modul_ID, $Klausurnote_ID)
    {
        if (($model = ModulGehoertKlausurnote::findOne(['Modul_ID' => $Modul_ID, 'Klausurnote_ID' => $Klausurnote_ID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
