<?php

namespace frontend\controllers;

use common\models\Uebungsgruppe;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\UebungsgruppeSuchen;
use common\models\BenutzerTeilnimmtUebungsgruppe;
use common\models\Uebung;

/**
 * UbungsgruppeController implements the CRUD actions for Uebungsgruppe model.
 */
class UebungsgruppeController extends Controller
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
        $modelUebung = Uebung::findOne($id);
        $searchModel = new UebungsgruppeSuchen();
        $dataProvider = $searchModel->searchGruppe($id);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'modelUebung' => $modelUebung,
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
    
    /*
     * Anmeldung 
     */
    public function actionAnmelden($id, $marterikelNr) {
        BenutzerTeilnimmtUebungsgruppe::BenutzeranmeldenUebungsgruppe($id, $marterikelNr);
        return $this->redirect(['uebung/index']);
    }
}
