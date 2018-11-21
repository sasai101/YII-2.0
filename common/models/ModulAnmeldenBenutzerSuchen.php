<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ModulAnmeldenBenutzer;

/**
 * ModulAnmeldenBenutzerSuchen represents the model behind the search form about `common\models\ModulAnmeldenBenutzer`.
 */
class ModulAnmeldenBenutzerSuchen extends ModulAnmeldenBenutzer
{
    public function rules()
    {
        return [
            [['ModulID', 'Benutzer_MarterikelNr'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ModulAnmeldenBenutzer::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ModulID' => $this->ModulID,
            'Benutzer_MarterikelNr' => $this->Benutzer_MarterikelNr,
        ]);

        return $dataProvider;
    }
}
