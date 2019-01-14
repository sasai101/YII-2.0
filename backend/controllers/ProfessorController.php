<?php

namespace backend\controllers;

use Yii;
use common\models\Professor;
use common\models\ProfessorSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * ProfessorController implements the CRUD actions for Professor model.
 */
class ProfessorController extends Controller
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
     * Lists all Professor models.
     * @return mixed
     */
    public function actionIndex()
    {
        //BefugnisTeil
        if(!Yii::$app->user->can('indexProfessor')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
        $searchModel = new ProfessorSuchen;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Professor model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //BefugnisTeil
        if(!Yii::$app->user->can('viewProfessor')){
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
     * Deletes an existing Professor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //BefugnisTeil
        if(!Yii::$app->user->can('deleteProfessor')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
        //alles über Prof löschen
        Professor::DeleteModulLeitePro($id);
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Professor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Professor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Professor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
