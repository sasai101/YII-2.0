<?php

namespace frontend\controllers;

use Yii;
use common\models\Abgabe;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\base\Model;
use yii\filters\VerbFilter;

/**
 * KlausurnoteController implements the CRUD actions for Abgabe model.
 */
class AbgabeController extends Controller
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
     * Abgabe abgeben
     */
    public function actionAbgabeabgeben($id)
    {
        
        $model = $this->findModel($id);
        $modelEinzelaufgabe =$model->einzelaufgabes;
        
        if(Model::loadMultiple($modelEinzelaufgabe, Yii::$app->request->post()))
        {
            // Path wo die Datein speichern
            $modelPath = "../../Uebung/Abgabe/Modul".$model->uebungsblaetter->uebungs->modul->ModulID."/UebungsID".$model->uebungsblaetter->uebungs->UebungsID."/Uebungsgruppe".$model->uebungsgruppen->GruppenNr."/Uebungsblaetter".$model->uebungsblaetter->UebungsNr;
                       
            // die Instance von File zu kriegen
            // 0777 ist Befugnis
            if(!file_exists($modelPath)){
                mkdir($modelPath, 0777, true);
            }
            
            if($model->file = UploadedFile::getInstance($model,'file')){
                $model->file->saveAs($modelPath.'/'.$model->Benutzer_MarterikelNr.'.'.$model->file->extension);
                $model->Datein = $modelPath.'/'.$model->Benutzer_MarterikelNr.'.'.$model->file->extension;
            }
            // Bei der Validierung tritt ein Fehler, weshalb setze hier save->(false) ein.
            /*
             * Heir muss man die Konfigurationsdatei von PHP (also php.ini) mal korrigieren. Also upload_max_filesize und post_max_size ein neue Grösse geben.
             * sonst wird die Hochladung des Dateis verfalscht
             */
            $model->save(false);
            
            
            foreach ($modelEinzelaufgabe as $aufgabe)
            {
                $aufgabe->save(false);
            }
            $model->save();
            return $this->redirect(['uebung/index']);
        }
        
        return $this->render('abgabeabgeben', [
            'model' => $model,
        ]);
        
    }
    
    /*
     * Runterladen
     */
    public function actionDownload($id){
        $model = Abgabe::findOne($id);
        if(file_exists($model->Datein)){
            Yii::$app->response->sendFile($model->Datein);
        }
    }
    
    /*
     * View action
     */
    public function actionView($id) {
        
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['uebung/index']);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Finds the Abgabe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Abgabe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Abgabe::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
