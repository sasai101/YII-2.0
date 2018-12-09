<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Modul;

/**
 * ModulSuchen represents the model behind the search form about `common\models\Modul`.
 */
class ModulSuchen extends Modul
{
    public function rules()
    {
        return [
            [['ModulID','Maximale_Person'], 'integer'],
            [['Bezeichnung'], 'safe'],
            
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Modul::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ModulID' => $this->ModulID,
        ]);

        $query->andFilterWhere(['like', 'Bezeichnung', $this->Bezeichnung]);

        return $dataProvider;
    }
}
