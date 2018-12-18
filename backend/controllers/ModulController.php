<?php

namespace backend\controllers;

use Yii;
use common\models\Modul;
use common\models\ModulSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use common\models\ModulLeitetProfessor;
use backend\models\Model;
use common\models\Uebung;
use common\models\Uebungsgruppe;
use yii\helpers\ArrayHelper;
use backend\models\ModelProfe;
use backend\models\ModelUebung;
/**
 * ModulController implements the CRUD actions for Modul model.
 */
class ModulController extends Controller
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
     * Lists all Modul models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ModulSuchen;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Modul model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ModulID]);
        } else {
            return $this->renderAjax('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new Modul model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelModul = new Modul();
        $modelsProfessor = [new ModulLeitetProfessor];
        $modelsUebung = [new Uebung];
        $modelsUebungsgruppe = [[new Uebungsgruppe]];
        
        if($modelModul->load(Yii::$app->request->post())){
            //return $this->redirect(['view','id'=>$modelModul->ModulID]);
            
            $modelsProfessor = Model::createMultiple(ModulLeitetProfessor::classname());
            Model::loadMultiple($modelsProfessor, Yii::$app->request->post());
            // Ubungen und Uebungsgruppe
            $modelsUebung = Model::createMultiple(Uebung::classname());
            Model::loadMultiple($modelsUebung, Yii::$app->request->post());
            
            //validieren
            $valid = $modelModul->validate();
            $valid = Model::validateMultiple($modelsProfessor) && Model::validateMultiple($modelsUebung) && $valid;
            
            if(isset($_POST['Uebungsgruppe'][0][0])){
                foreach ($_POST['Uebungsgruppe'] as $indexUebung => $uebungsgruppen){
                    foreach ($uebungsgruppen as $indexUebungsgrupe => $uebungsgruppe){
                        $data['Uebungsgruppe'] = $uebungsgruppe;
                        $modelUebungsgruppe = new Uebungsgruppe;
                        $modelUebungsgruppe->load($data);
                        $modelsUebungsgruppe[$indexUebung][$indexUebungsgrupe] = $modelUebungsgruppe;
                        $valid = $modelUebungsgruppe->validate();
                    }
                }
                
            }
            
            if($valid){
                
                $transaction = Yii::$app->db->beginTransaction();
                try{
                    if ($flag = $modelModul->save(false)){
                        //Professoren
                        foreach ($modelsProfessor as $professor ){
                            
                            $professor->ModulID = $modelModul->ModulID;
                            if(!($flag=$professor->save(false))){
                                $transaction->rollBack();
                                break;
                            }
                        }
                        
                        //Übungen
                        foreach ($modelsUebung as $indexUebung => $modelUebung){
                            if($flag ===false){
                                break;
                            }
                            $modelUebung->ModulID = $modelModul->ModulID;
                            if(!($flag=$modelUebung->save(false))){
                                break;
                            }
                            
                            if (isset($modelsUebungsgruppe[$indexUebung]) && is_array($modelsUebungsgruppe[$indexUebung])) {
                                foreach ($modelsUebungsgruppe[$indexUebung] as $indexUebungsgrupe=>$modelUebungsgruppe){
                                    $modelUebungsgruppe->UebungsID = $modelUebung->UebungsID;
                                    if(!($flag = $modelUebungsgruppe->save(false))){
                                        $transaction->rollBack();
                                        break;
                                    }
                                }
                            }
                        }
                    }
                    if($flag){
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }
                }catch ( \Exception $e){
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('create',[
            'modelModul' => $modelModul,
            'modelsProfessor' => (empty($modelsProfessor)) ? [new ModulLeitetProfessor] : $modelsProfessor,
            'modelsUebung' => (empty($modelsUebung)) ? [new Uebung] : $modelsUebung,
            'modelsUebungsgruppe' => (empty($modelsUebungsgruppe)) ? [[new Uebungsgruppe]] : $modelsUebungsgruppe,
        ]);
    }
    

    /**
     * Updates an existing Modul model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $modelModul = $this->findModel($id);
        //Professor
        $modelsProfessor = $modelModul->modulLeitetProfessors;
        
        //Übung und Übungsgruppe
        $modelsUebung = $modelModul->uebungs;
        $modelsUebungsgruppe = [];
        $alteUebungsgruppen = [];
        
        
//         echo "<pre>";
//         echo "deleOK0.5";
//         print_r($modelsUebung);
//         echo "</pre>";
        
        
        if(!empty($modelsUebung)){
            foreach ($modelsUebung as $indexUebung => $modelUebung){
                $uebungsgruppen = $modelUebung->uebungsgruppes;
                $modelsUebungsgruppe[$indexUebung] = $uebungsgruppen;
                $alteUebungsgruppen = ArrayHelper::merge(ArrayHelper::index($uebungsgruppen, 'UebungsgruppeID'), $alteUebungsgruppen);
            }
        }
        
        if($modelModul->load(Yii::$app->request->post())){
            //Professor
            $alteProfessorID = ArrayHelper::map($modelsProfessor, 'Professor_MarterikelNr', 'Professor_MarterikelNr');            
            
            $modelsProfessor = ModelProfe::createMultiple(ModulLeitetProfessor::classname(), $modelsProfessor);
            
//             echo "<pre>";
//             print_r($modelsProfessor);
//             echo "</pre>";
            
            Model::loadMultiple($modelsProfessor, Yii::$app->request->post());
//             echo "<pre>";
//             print_r($modelsProfessor);
//             echo "</pre>";
            // Erro position
            $deletedProfessorID = array_diff($alteProfessorID, array_filter(ArrayHelper::map($modelsProfessor, 'Professor_MarterikelNr', 'Professor_MarterikelNr')));
            
            
            //Übungen und Übungsgruppe
            $modelsUebungsgruppe = [];
            $alteUebungID = ArrayHelper::map($modelsUebung, 'UebungsID', 'UebungsID');
            $modelsUebung = ModelUebung::createMultiple(Uebung::classname(), $modelsUebung);
            Model::loadMultiple($modelsUebung, Yii::$app->request->post());
            $deletedUebungID = array_diff($alteUebungID, array_filter(ArrayHelper::map($modelsUebung, 'UebungsID', 'UebungsID')));
            
            echo "<pre>";
            echo "deleOK1";
            print_r($deletedUebungID);
            echo "</pre>";
            
            
            $valid = $modelModul->validate();
            $valid = Model::validateMultiple($modelsProfessor) && Model::validateMultiple($modelsUebung) && $valid;
            
            $uebungsgruppeID = [];
            
            echo "<pre>";
            echo "OK1";
            print_r($uebungsgruppeID);
            echo "</pre>";
            
            //Übungsgruppe
            if(isset($_POST['Uebungsgruppe'][0][0])){
                
                echo "<pre>";
                echo "OK1.5";
                print_r($_POST['Uebungsgruppe']);
                echo "</pre>";
                
                echo "<pre>";
                echo "OK2";
                print_r($uebungsgruppeID);
                echo "</pre>";
                
                foreach ($_POST['Uebungsgruppe'] as $indexUebung => $uebungsgruppen){
                    
                    echo "<pre>";
                    echo "OK3";
                    print_r($_POST['Uebungsgruppe'][0][0]);
                    print_r($uebungsgruppeID);
                    echo "</pre>";
                    
                    $uebungsgruppeID = ArrayHelper::merge($uebungsgruppeID, array_filter(ArrayHelper::getColumn($uebungsgruppen, 'UebungsgruppeID')));
                    
                    echo "<pre>";
                    echo "OK4.5";
                    print_r($uebungsgruppen);
                    echo "</pre>";
                    
                    foreach ($uebungsgruppen as $indexUebungsgrupe => $uebungsgruppe){
                        
                        echo "<pre>";
                        echo "OK4";
                        print_r($uebungsgruppeID);
                        echo "</pre>";
                        
                        $data['Uebungsgruppe'] = $uebungsgruppe;
                        $modelUebungsgruppe = (isset($uebungsgruppe['UebungsgruppeID']) && isset($alteUebungsgruppen[$uebungsgruppe['UebungsgruppeID']]))? $alteUebungsgruppen[$uebungsgruppe['UebungsgruppeID']] : new Uebungsgruppe;
                        $modelUebungsgruppe->load($data);
                        $modelsUebungsgruppe[$indexUebung][$indexUebungsgrupe] = $modelUebungsgruppe;
                        $valid = $modelUebungsgruppe->validate();
                    }
                    
                    echo "<pre>";
                    echo "OK5";
                    print_r($uebungsgruppeID);
                    echo "</pre>";
                }
                
            }
            $alteUebungsgruppeID = ArrayHelper::getColumn($alteUebungsgruppen, 'UebungsgruppeID');
            $deletedUebungsgruppeID = array_diff($alteUebungsgruppeID, $uebungsgruppeID);
            
            echo "<pre>";
            echo "OKOKOKOK end";
            //print_r($alteUebungsgruppen);
            print_r('UebungsgruppeID');
            print_r($alteUebungsgruppeID);
            print_r($deletedUebungsgruppeID);
            echo "</pre>";
            //exit(0);
            
            
            
            if($valid){
                $transcation = Yii::$app->db->beginTransaction();
                try{
                    if($flag = $modelModul->save(false)){
                        // Professor
                        
                        if(!empty($deletedProfessorID)){
                            
                            //Löschen die jenigen Items, die in der Tabelle ModolleitetProfess beim Update ausgewählt werden.
                            $deletModulProf = ModulLeitetProfessor::findModelleitetProf($id, $deletedProfessorID);
//                          echo "<pre>";
//                          print_r($modelsProfessor);
//                          echo "</pre>";
//                          exit(0);

                            ModulLeitetProfessor::deleteAll(['ModulID'=>$deletModulProf->ModulID, 'Professor_MarterikelNr'=>$deletedProfessorID]);
//                          echo "<pre>";
//                          print_r($modelsProfessor);
//                          echo "</pre>";
//                          exit(0);
                            
                        }
                        foreach ($modelsProfessor as $modelProfessor){
                            $modelProfessor->ModulID = $modelModul->ModulID;
                            if(!($flag = $modelProfessor->save(false))){
                                $transcation->rollBack();
                                break;
                            }
                        }
                        
                        // Uebungen und Übungsgruppen
                        if(!empty($deletedUebungsgruppeID)){
                            Uebungsgruppe::deleteAll(['UebungsgruppeID'=>$deletedUebungsgruppeID]);
                        }
                        if (!empty($deletedUebungID)){
                            Uebung::deleteAll(['UebungsID'=>$deletedUebungID]);
                        }
                        foreach ($modelsUebung as $indexUebung => $modelUebung){
                            if($flag ===false){
                                break;
                            }
                            $modelUebung->ModulID = $modelModul->ModulID;
                            if(!($flag=$modelUebung->save(false))){
                                break;
                            }
                            
                            if (isset($modelsUebungsgruppe[$indexUebung]) && is_array($modelsUebungsgruppe[$indexUebung])) {
                                foreach ($modelsUebungsgruppe[$indexUebung] as $indexUebungsgrupe=>$modelUebungsgruppe){
                                    $modelUebungsgruppe->UebungsID = $modelUebung->UebungsID;
                                    if(!($flag = $modelUebungsgruppe->save(false))){
                                        $transaction->rollBack();
                                        break;
                                    }
                                }
                            }
                        }
                    
                    }
                    if($flag){
                        $transcation->commit();
                        return $this->redirect(['index']);
                    }
                }catch (\Exception $e) {
                    $transcation->rollBack();
                }
            }
        }
        return $this->render('update',[
            'modelModul' => $modelModul,
            'modelsProfessor' => (empty($modelsProfessor)) ? [new ModulLeitetProfessor] : $modelsProfessor,
            'modelsUebung' => (empty($modelsUebung)) ? [new Uebung] : $modelsUebung,
            'modelsUebungsgruppe' => (empty($modelsUebungsgruppe)) ? [[new Uebungsgruppe]] : $modelsUebungsgruppe,
        ]);
        
    }

    /**
     * Deletes an existing Modul model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        // die Übung und zugehörigen Übungsgruppen löschen
        $model = (new Query())->select(['UebungsID'])->from('uebung')->where(['ModulID'=>$id])->all();
        foreach ($model as $index){
            $model1 = (new Query())->select(['UebungsgruppeID'])->from('uebungsgruppe')->where(['UebungsID'=>$index])->all();
            foreach ($model1 as $index1){
                echo "<pre>";
                print_r($index1);
                echo "<pre>";
                Uebungsgruppe::findOne($index1)->delete();
            }
            Uebung::findOne($index)->delete();
        }
        
        // Löschen die Daten in der Tabelle ModullLeitetProfessor
        /*
        echo "<pre>";
        print_r(Professor::profName());
        echo "<pre>";
        exit(0);*/

        $model3 = ModulLeitetProfessor::findAll($id);
        foreach ($model3 as $index){
            ModulLeitetProfessor::findOne($index->ModulID, $index->professorMarterikelNr)->delete();
        }
        
        
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Modul model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Modul the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Modul::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}