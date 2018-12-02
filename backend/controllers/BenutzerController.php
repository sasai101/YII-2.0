<?php

namespace backend\controllers;

use Yii;
use common\models\Benutzer;
use common\models\BenutzerSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\PasswortVerandern;
use backend\models\ProfieVerandern;
/**
 * BenutzerController implements the CRUD actions for Benutzer model.
 */
class BenutzerController extends Controller
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
     * Lists all Benutzer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BenutzerSuchen;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Benutzer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MarterikelNr]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new Benutzer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Benutzer;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MarterikelNr]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Benutzer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MarterikelNr]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Benutzer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Benutzer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Benutzer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Benutzer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    /*
     * Action für Profieveränderung für eingeloggten Person
     */
    public function actionProfiev()
    {
        $model = new ProfieVerandern();
        $model->Vorname = Yii::$app->user->identity->Vorname;
        $model->Nachname = Yii::$app->user->identity->Nachname;
        $model->email = Yii::$app->user->identity->email;
        
        if ($model->load(Yii::$app->request->post())) {
            
            if($model->passwortZurucksetzen(\Yii::$app->user->getId()))
            {
                return $this->redirect(['index']);
            }
        }
         
        return $this->render('profiev',[
            'model'=>$model
            
        ]);
        /*
         $model = \Yii::$app->user->identity->Vorname;
         echo "<pre>";
         print_r($model);
         echo "</pre>";
         exit(0);
         */
    }

    /*
    * Action fuer Hauptseite
    */
    public function actionHauptseite()
    {
        $searchModel = new BenutzerSuchen;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('hauptseite', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
    
    /*
     * Action für Passwortveränderung für alle benutzer
     */
    public function actionPasswortveranderung($id)
    {
        $model = new PasswortVerandern();
        
        if ($model->load(Yii::$app->request->post())) {
            
            if($model->passwortZurucksetzen($id))
            {
                return $this->redirect(['index']);
            }
        }
        
        return $this->renderAjax('passwortveranderung', [
            'model' => $model,
        ]);
    }
    
}
