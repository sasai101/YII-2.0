<?php

namespace frontend\controllers;

use Yii;
use common\models\Klausur;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\BenutzerAnmeldenKlausur;
use common\models\Klausurnote;

/**
 * KlausurController implements the CRUD actions for Klausur model.
 */
class KlausurController extends Controller
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
     * Lists all Klausur models.
     * @return mixed
     */
    public function actionKlausur()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => BenutzerAnmeldenKlausur::find()->where(['Benutzer_MarterikelNr'=>Yii::$app->user->identity->MarterikelNr]),
        ]);

        return $this->render('klausur', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Lists all Klausur models.
     * @return mixed
     */
    public function actionKlausurnote()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Klausurnote::find()->where(['Benutzer_MarterikelNr'=>Yii::$app->user->identity->MarterikelNr]),
        ]);
        
        return $this->render('klausurnote', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Klausur model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Klausur the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Klausur::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
