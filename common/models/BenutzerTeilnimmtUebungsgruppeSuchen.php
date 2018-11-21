<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BenutzerTeilnimmtUebungsgruppe;

/**
 * BenutzerTeilnimmtUebungsgruppeSuchen represents the model behind the search form about `common\models\BenutzerTeilnimmtUebungsgruppe`.
 */
class BenutzerTeilnimmtUebungsgruppeSuchen extends BenutzerTeilnimmtUebungsgruppe
{
    public function rules()
    {
        return [
            [['Benuter_MarterikelNr', 'UebungsgruppeID'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = BenutzerTeilnimmtUebungsgruppe::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'Benuter_MarterikelNr' => $this->Benuter_MarterikelNr,
            'UebungsgruppeID' => $this->UebungsgruppeID,
        ]);

        return $dataProvider;
    }
}
