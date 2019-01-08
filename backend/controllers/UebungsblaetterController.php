<?php

namespace backend\controllers;

use Yii;
use common\models\Uebungsblaetter;
use common\models\UebungsblaetterSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use common\models\Uebung;
use phpDocumentor\Reflection\Types\Null_;
use common\models\UebungSuchen;

/**
 * UebungsblaetterController implements the CRUD actions for Uebungsblaetter model.
 */
class UebungsblaetterController extends Controller
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
     * Lists all Uebungsblaetter models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new UebungsblaetterSuchen;
        $dataProvider = $searchModel->searchMitID($id);
        $modelUebung = Uebung::findOne($id);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'modelUebung'=> $modelUebung,
        ]);
    }

    /**
     * Displays a single Uebungsblaetter model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->UebungsblatterID]);
        } else {
            return $this->renderAjax('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new Uebungsblaetter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {        
        $model = new Uebungsblaetter;
        $modelUebung = Uebung::findOne($id);
        
        if(Yii::$app->request->isAjax && $model->load($_POST)){
            \Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
              
        if ($model->load(Yii::$app->request->post())) {
            
            
            // Path wo die Datein speichern
            $modelPath = "../../Uebung/Uebungsblaetter/Modul".$modelUebung->ModulID."/UebungsID".$modelUebung->UebungsID;
            
            //automatisch die beiben Attributen erfüllen
            $model->UebungsID = $id;
            if(Uebungsblaetter::getAnzahlderBlaetter($id)==0)
            {
                $model->UebungsNr = 1;
            }else {
                $model->UebungsNr = Uebungsblaetter::getAnzahlderBlaetter($id)+1;
            }
            
            
            //der Name des hochgeladenen Datein
            $blatterName = "Übungsblatt".$model->UebungsNr;

            
            // die Instance von File zu kriegen
            // 0777 ist Befugnis
            if(!file_exists($modelPath)){
                mkdir($modelPath, 0777, true);
            }
            
            if($model->file = UploadedFile::getInstance($model,'file')){
                $model->file->saveAs($modelPath.'/'.$blatterName.'.'.$model->file->extension);
                $model->Datein = $modelPath.'/'.$blatterName.'.'.$model->file->extension;
            }
            // Bei der Validierung tritt ein Fehler, weshalb setze hier save->(false) ein.
            /*
             * Heir muss man die Konfigurationsdatei von PHP (also php.ini) mal korrigieren. Also upload_max_filesize und post_max_size ein neue Grösse geben.
             * sonst wird die Hochladung des Dateis verfalscht
             */
            $model->save(false);
            
            return $this->redirect(['index', 'id' => $modelUebung->UebungsID]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelUebung' => $modelUebung,
            ]);
        }
    }

    /**
     * Updates an existing Uebungsblaetter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $modelUebung = Uebung::findOne($model->UebungsID);
        
        // Path wo die Datein speichern
        $modelPath = "../../Uebung/Uebungsblaetter/Modul".$modelUebung->ModulID."/UebungsID".$modelUebung->UebungsID;
        
        if(Yii::$app->request->isAjax && $model->load($_POST)){
            \Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            //der Name des hochgeladenen Datein
            $blatterName = "Übungsblatt".$model->UebungsNr;

            if($model->file = UploadedFile::getInstance($model,'file')){
                $model->file->saveAs($modelPath.'/'.$blatterName.'.'.$model->file->extension);
                $model->Datein = $modelPath.'/'.$blatterName.'.'.$model->file->extension;
            }
            
            $model->save();
            
            return $this->redirect(['index', 'id' => $modelUebung->UebungsID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Uebungsblaetter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        // Die UebungsID herausfinden und in der redirect weiter geben, um die richtig Gridview zu zeigen
        $model = $this->findModel($id);
        $uebungsID = $model->UebungsID;
        
        Uebungsblaetter::AllesLoeschen($id);
        
        $this->findModel($id)->delete();

        return $this->redirect(['index', 'id' => $uebungsID]);
    }

    /**
     * Finds the Uebungsblaetter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Uebungsblaetter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Uebungsblaetter::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /*
     * Abgabe Status
     */
    public function actionAbgabestatus($id) {
        $model = $this->findModel($id);
        
        return $this->render('abgabestatus',[
            'model' => $model,
        ]);
    }
}
