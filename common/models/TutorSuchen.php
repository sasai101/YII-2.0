<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Tutor;

/**
 * TutorSuchen represents the model behind the search form about `common\models\Tutor`.
 */
class TutorSuchen extends Tutor
{
    public function rules()
    {
        return [
            [['MarterikelNr'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Tutor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'MarterikelNr' => $this->MarterikelNr,
        ]);

        return $dataProvider;
    }
}
