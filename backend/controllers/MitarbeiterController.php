<?php

namespace backend\controllers;

use Yii;
use common\models\Mitarbeiter;
use common\models\MitarbeiterSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * MitarbeiterController implements the CRUD actions for Mitarbeiter model.
 */
class MitarbeiterController extends Controller
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
     * Lists all Mitarbeiter models.
     * @return mixed
     */
    public function actionIndex()
    {
        //BefugnisTeil
        if(!Yii::$app->user->can('indexMitarbeiter')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
        $searchModel = new MitarbeiterSuchen;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Mitarbeiter model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //BefugnisTeil
        if(!Yii::$app->user->can('viewMitarbeiter')){
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
     * Deletes an existing Mitarbeiter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //BefugnisTeil
        if(!Yii::$app->user->can('deleteMitarbeiter')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
        // alles Dinges über Mitarbeiter löschen
        Mitarbeiter::DeleteMitarbeiter($id);
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mitarbeiter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mitarbeiter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mitarbeiter::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
