<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Korrektor;

/**
 * KorrektorSuchen represents the model behind the search form about `common\models\Korrektor`.
 */
class KorrektorSuchen extends Korrektor
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
        $query = Korrektor::find();

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
