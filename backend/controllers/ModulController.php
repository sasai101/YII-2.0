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
        
        if($modelModul->load(Yii::$app->request->post())){
            //return $this->redirect(['view','id'=>$modelModul->ModulID]);
            
            $modelsProfessor = Model::createMultiple(ModulLeitetProfessor::classname());
            Model::loadMultiple($modelsProfessor, Yii::$app->request->post());
            //validieren
            $valid = $modelModul->validate();
            $valid = Model::validateMultiple($modelsProfessor) && $valid;
            
            if($valid){
                
                $transaction = Yii::$app->db->beginTransaction();
                try{
                    if ($flag = $modelModul->save(false)){
                        foreach ($modelsProfessor as $professor ){
                            
                            $professor->ModulID = $modelModul->ModulID;
                            if(!($flag=$professor->save(false))){
                                $transaction->rollBack();
                                break;
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
            //'modelsProfessor' => $modelsProfessor,
            'modelsProfessor' => (empty($modelsProfessor)) ? [new ModulLeitetProfessor] : $modelsProfessor
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
        // Löschen die Daten in der Tabelle ModullLeitetProfessor
        /*
        echo "<pre>";
        print_r(Professor::profName());
        echo "<pre>";
        exit(0);*/

        $model = ModulLeitetProfessor::findAll($id);
        foreach ($model as $index){
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