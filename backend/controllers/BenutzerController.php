<?php

namespace backend\controllers;

use Yii;
use common\models\Benutzer;
use common\models\BenutzerSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use backend\models\PasswortVerandern;
use yii\imagine\Image;
use common\models\AuthAssignment;
use common\models\Korrektor;
use common\models\Mitarbeiter;
use common\models\AuthItem;
use common\models\Admin;
use common\models\Professor;
use common\models\Tutor;

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
        //BefugnisTeil
        if(!Yii::$app->user->can('indexBenutzer')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
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
        //BefugnisTeil
        if(!Yii::$app->user->can('viewBenutzer')){
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
     * Updates an existing Benutzer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //BefugnisTeil
        if(!Yii::$app->user->can('updateBenutzer')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
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
        //BefugnisTeil
        if(!Yii::$app->user->can('deleteBenutzer')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
        // Löschen alle Item in der Tabelle, welche mit dem Tabelle Benutzer eine Realtion hat
        Benutzer::DeleteBenutzersDaten($id);
        
        //Benutzer Tabelle
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
        //BefugnisTeil
        if(!Yii::$app->user->can('passwortBenutzer')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
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
    
    /*
     * Befugnisse für Benutzer addieren und löschen
     */
    public function actionBefugnis($id) 
    {
        //BefugnisTeil
        if(!Yii::$app->user->can('befugnisBenutzer')){
            throw new ForbiddenHttpException('Sie haben kein Befugniss');
        }
        
        $model = $this->findModel($id);
        //finde alle Befugnisse 
        $allBefugnisse = AuthItem::find()->select(['name','description'])->where(['type'=>1])->orderBy('description')->all();
        
        foreach($allBefugnisse as $befugnis){
            $allBefugnisseInArray[$befugnis->name]=$befugnis->description;
        }
        
        //finde alle Befugnisse, die man schon hat
        $AuthAssignments = AuthAssignment::find()->select(['item_name'])
        ->where(['user_id'=>$id])->orderBy('item_name')->all();
        
        $AuthAssignmentInArray = array();
        foreach ($AuthAssignments as $AuthAssignment){
            array_push($AuthAssignmentInArray, $AuthAssignment->item_name);
        }
        
        // refresh tabelle AuthAssignment, durch die abgegebene Daten
        if(isset($_POST['neueBefugnis'])){
            //print_r($_POST['neueBefugnis']);
            //print_r($AuthAssignmentInArray);
            //Alle gelöschte Befugnis
            $modeldelte = array_diff($AuthAssignmentInArray, $_POST['neueBefugnis']);
            
            
            //Daten in der entsprechende Tabelle löschen
            foreach ($modeldelte as $roller){
                if($roller == 'mitar'){
                    // Mitarbeiter aus der Tabelle löschen
                    if(Mitarbeiter::findOne($id)!=null){
                        Mitarbeiter::DeleteMitarbeiter($id);
                        Mitarbeiter::findOne($id)->delete();
                    }
                    
                }else if($roller == 'admin'){
                    // Admin aus der Tabelle löschen
                    if(Admin::findOne($id)!=null){
                        Admin::findOne($id)->delete();
                    }
                    
                }else if($roller == 'korr'){
                    // Korrektor aus der Tabelle löschen
                    if(Korrektor::findOne($id)!=null){
                        Korrektor::DeleteKorrektor($id);
                        Korrektor::findOne($id)->delete();
                    }
                    
                }else if($roller == 'prof'){
                    // Professor aus der Tabelle löschen
                    if(Professor::findOne($id)!=null){
                        Professor::DeleteModulLeitePro($id);
                        Professor::findOne($id)->delete();
                    }
                    
                }else if($roller == 'tut'){
                    // Tutor aus der Tabelle löschen
                    if(Tutor::findOne($id)!=null){
                        Tutor::DeleteTutor($id);
                        Tutor::findOne($id)->delete();
                    }
                }
            }
            
            AuthAssignment::deleteAll('user_id=:id',[':id'=>$id]);
            
            
            // neue Addierte Befunis
            $modelNeue = array_diff( $_POST['neueBefugnis'],$AuthAssignmentInArray);
            
            foreach ($modelNeue as $roller){
                if($roller == 'mitar'){
                    // Mitarbeiter in der Tabelle reinschreiben
                    $modelnew = new Mitarbeiter;
                    $modelnew->MarterikelNr = $id;
                    $modelnew->save();
                    
                }else if($roller == 'admin'){
                    // Admin in der Tabelle reinschreiben
                    $modelnew = New Admin;
                    $modelnew->MarterikelNr = $id;
                    $modelnew->create_time = time();
                    $modelnew->save();
                    
                }else if($roller == 'korr'){
                    // Korrektor in der Tabelle reinschreiben
                    $modelnew = New Korrektor;
                    $modelnew->MarterikelNr = $id;
                    $modelnew->save();
                    
                }else if($roller == 'prof'){
                    // Professor in der Tabelle reinschreiben
                    $modelnew = New Professor;
                    $modelnew->MarterikelNr = $id;
                    $modelnew->save();
                    
                }else if($roller == 'tut'){
                    // Tutor in der Tabelle reinschreiben
                    $modelnew = New Tutor;
                    $modelnew->MarterikelNr = $id;
                    $modelnew->save();
                    
                }
            }
            
            $neueBefugnis = $_POST['neueBefugnis'];
            $arrayBefugnis = count($neueBefugnis);
            // Alle neue Befugniss in der Tabelle AuthAssignment reinschreiben
            for($i=0;$i<$arrayBefugnis;$i++){
                $neueBefug = new AuthAssignment;
                $neueBefug->item_name = $neueBefugnis[$i];
                $neueBefug->user_id = $id;
                $neueBefug->created_at = time();
                $neueBefug->save();
            }
            return $this->redirect(['index']);
            
        }
        
        return $this->render('befugnis',[
            'id' => $id,
            'model'=>$model,
            'AuthAssignmentInArray' => $AuthAssignmentInArray,
            'allBefugnisseInArray' => $allBefugnisseInArray,
        ]);
    }   
}
