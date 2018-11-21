<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ModulGehoertKlausurnote;

/**
 * ModulGehoertKlausurnoteSuchen represents the model behind the search form about `common\models\ModulGehoertKlausurnote`.
 */
class ModulGehoertKlausurnoteSuchen extends ModulGehoertKlausurnote
{
    public function rules()
    {
        return [
            [['Modul_ID', 'Klausurnote_ID'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ModulGehoertKlausurnote::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'Modul_ID' => $this->Modul_ID,
            'Klausurnote_ID' => $this->Klausurnote_ID,
        ]);

        return $dataProvider;
    }
}
