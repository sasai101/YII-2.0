<?php

namespace backend\controllers;

use Yii;
use common\models\Modul;
use common\models\ModulSuchen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\db\Query;
use common\models\ModulLeitetProfessor;
use backend\models\Model;
use common\models\Professor;
use common\models\Uebung;
use common\models\Uebungsgruppe;
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
                        return $this->redirect(['view','id'=>$modelModul->ModulID]);
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ModulID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
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