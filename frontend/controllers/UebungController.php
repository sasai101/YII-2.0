<?php

namespace frontend\controllers;

use Yii;
use common\models\Uebung;
use common\models\UebungSuchen;
use common\models\Uebungsblaetter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UebungController implements the CRUD actions for Uebung model.
 */
class UebungController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Uebung models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UebungSuchen();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Uebung model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Uebung the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Uebung::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    /*
     * Runterladen
     */
    public function actionDownload($id){
        $model = Uebungsblaetter::findOne($id);
        if(file_exists($model->Datein)){
            Yii::$app->response->sendFile($model->Datein);
        }
    }
}
