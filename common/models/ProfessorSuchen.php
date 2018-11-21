<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Professor;

/**
 * ProfessorSuchen represents the model behind the search form about `common\models\Professor`.
 */
class ProfessorSuchen extends Professor
{
    public function rules()
    {
        return [
            [['MarterikelNr'], 'integer'],
            [['Buero'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Professor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'MarterikelNr' => $this->MarterikelNr,
        ]);

        $query->andFilterWhere(['like', 'Buero', $this->Buero]);

        return $dataProvider;
    }
}
