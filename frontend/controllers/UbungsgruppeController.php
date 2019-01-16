<?php

namespace frontend\controllers;

use common\models\Uebungsgruppe;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UbungsgruppeController implements the CRUD actions for Uebungsgruppe model.
 */
class UbungsgruppeController extends Controller
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
     * Lists all Uebungsgruppe models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new Uebungsgruppe();
        $dataProvider = $searchModel->search($id);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Uebungsgruppe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Uebungsgruppe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Uebungsgruppe::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
