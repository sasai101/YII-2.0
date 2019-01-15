<?php

namespace frontend\controllers;

use Yii;
use common\models\Benutzer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use frontend\models\PasswortVerandern;

/**
 * BenutzerController implements the CRUD actions for Benutzer model.
 */
class BenutzerController extends Controller
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

    /*
     * Profiepasswort zu veraendern
     */
    public function actionProfiepassword()
    {
        $model = new PasswortVerandern;
        
        if ($model->load(Yii::$app->request->post())) {
            
            if($model->passwortZurucksetzen(\Yii::$app->user->getId()))
            {
                return $this->redirect(['uebung/index']);
            }
        }
        
        return $this->render('profiepassword',[
            'model'=>$model
            
        ]);
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
            
            return $this->redirect(['uebung/index']);
        } else {
            return $this->render('profieandern', [
                'model' => $model,
            ]);
        }
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
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
