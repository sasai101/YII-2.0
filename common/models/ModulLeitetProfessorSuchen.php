<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ModulLeitetProfessor;

/**
 * ModulLeitetProfessorSuchen represents the model behind the search form about `common\models\ModulLeitetProfessor`.
 */
class ModulLeitetProfessorSuchen extends ModulLeitetProfessor
{
    public function rules()
    {
        return [
            [['ModulID', 'Professor_MarterikelNr'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ModulLeitetProfessor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ModulID' => $this->ModulID,
            'Professor_MarterikelNr' => $this->Professor_MarterikelNr,
        ]);

        return $dataProvider;
    }
    
    /*
     * Modul mit bestimmten ModulID suchen. professor/view
     */
    
    public function searchAlleModul($params)
    {
        $query = ModulLeitetProfessor::find()->where(['Professor_MarterikelNr'=>$params]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        return $dataProvider;
    }
}
