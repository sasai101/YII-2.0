<?php

namespace backend\controllers;

use Yii;
use common\models\ModulLeitetProfessor;
use common\models\ModulLeitetProfessorSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ModulLeitetProfessorController implements the CRUD actions for ModulLeitetProfessor model.
 */
class ModulLeitetProfessorController extends Controller
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
     * Lists all ModulLeitetProfessor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ModulLeitetProfessorSuchen;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single ModulLeitetProfessor model.
     * @param integer $ModulID
     * @param integer $Professor_MarterikelNr
     * @return mixed
     */
    public function actionView($ModulID, $Professor_MarterikelNr)
    {
        $model = $this->findModel($ModulID, $Professor_MarterikelNr);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ModulID]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new ModulLeitetProfessor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ModulLeitetProfessor;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ModulID' => $model->ModulID, 'Professor_MarterikelNr' => $model->Professor_MarterikelNr]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ModulLeitetProfessor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ModulID
     * @param integer $Professor_MarterikelNr
     * @return mixed
     */
    public function actionUpdate($ModulID, $Professor_MarterikelNr)
    {
        $model = $this->findModel($ModulID, $Professor_MarterikelNr);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ModulID' => $model->ModulID, 'Professor_MarterikelNr' => $model->Professor_MarterikelNr]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ModulLeitetProfessor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ModulID
     * @param integer $Professor_MarterikelNr
     * @return mixed
     */
    public function actionDelete($ModulID, $Professor_MarterikelNr)
    {
        $this->findModel($ModulID, $Professor_MarterikelNr)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ModulLeitetProfessor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ModulID
     * @param integer $Professor_MarterikelNr
     * @return ModulLeitetProfessor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ModulID, $Professor_MarterikelNr)
    {
        if (($model = ModulLeitetProfessor::findOne(['ModulID' => $ModulID, 'Professor_MarterikelNr' => $Professor_MarterikelNr])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
