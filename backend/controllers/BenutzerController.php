<?php

namespace backend\controllers;

use Yii;
use common\models\Benutzer;
use common\models\BenutzerSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use backend\models\PasswortVerandern;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;

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
     * Updates an existing Benutzer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $FotoName = $model->MarterikelNr;
            // die Instance von File zu kriegen
            if($model->file = UploadedFile::getInstance($model,'file')){
                $model->file->saveAs('../../profiefoto/'.$FotoName.'.'.$model->file->extension);
                $model->Profiefoto = '../../profiefoto/'.$FotoName.'.'.$model->file->extension;
                //Image::getImagine()->open($model->Profiefoto)->thumbnail(new Box(160, 160))->save($model->Profiefoto , ['quality' => 90]);
                Image::thumbnail($model->Profiefoto, 160, 160)->save($model->Profiefoto , ['quality' => 90]);
            }
            
            $model->save();
            /*
            $model->save();
            VarDumper::dump($model->errors);
            exit(0);
            */
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
        $model1 = Benutzer::findOne($id);
        
        if ($model->load(Yii::$app->request->post())) {
            
            if($model->passwortZurucksetzen($id))
            {
                return $this->redirect(['index']);
            }
        }
        
        return $this->render('passwortveranderung', [
            'model' => $model,
            'model1' => $model1,
        ]);
    }
    
    /*
     * Profiepasswort zu veraendern
     */
    public function actionProfiepassword()
    {
        $model = new PasswortVerandern();
        
        if ($model->load(Yii::$app->request->post())) {
            
            if($model->passwortZurucksetzen(\Yii::$app->user->getId()))
            {
                return $this->redirect(['index']);
            }
        }
        
        return $this->render('profiepassword',[
            'model'=>$model
            
        ]);
    }
    
    /*
     * Profiepasswort anzusehen
     */
    public function actionProfieview() 
    {
        $model = $this->findModel(\Yii::$app->user->getId());
        
         /*
         echo "<pre>";
         print_r($model);
         echo "</pre>";
         exit(0);*/
         
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MarterikelNr]);
        } else {
            return $this->renderAjax('profieview', ['model' => $model]);
        }
    }
    
    /*
     * Profie zu veraendern
     */
    public function actionProfieandern()
    {
        $model = $this->findModel(\Yii::$app->user->getId());
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $FotoName = $model->MarterikelNr;
            // die Instance von File zu kriegen
            if($model->file = UploadedFile::getInstance($model,'file')){
                $model->file->saveAs('../../profiefoto/'.$FotoName.'.'.$model->file->extension);
                $model->Profiefoto = '../../profiefoto/'.$FotoName.'.'.$model->file->extension;
                Image::thumbnail($model->Profiefoto, 160, 160)->save($model->Profiefoto , ['quality' => 90]);
            }
            //$model->file->saveAs('../../profiefoto/'.$FotoName.'.'.$model->file->extension);
            //$model->Profiefoto = '../../profiefoto/'.$FotoName.'.'.$model->file->extension;
            $model->save();
            
            return $this->redirect(['view', 'id' => $model->MarterikelNr]);
        } else {
            return $this->render('profieandern', [
                'model' => $model,
            ]);
        }
    }
    /*
     * Controlle für Leistung
     */
    public function actionLeisung($id) {
        
        $searchModel = new BenutzerSuchen;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        
        return $this->renderAjax('benutzer/leistung', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
}
