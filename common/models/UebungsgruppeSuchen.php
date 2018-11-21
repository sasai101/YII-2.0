<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Uebungsgruppe;

/**
 * UebungsgruppeSuchen represents the model behind the search form about `common\models\Uebungsgruppe`.
 */
class UebungsgruppeSuchen extends Uebungsgruppe
{
    public function rules()
    {
        return [
            [['UebungsgruppeID', 'UebungsID', 'Tutor_MarterikelNr', 'Anzahl_der_Personen', 'GruppenNr', 'Max_Person'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Uebungsgruppe::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'UebungsgruppeID' => $this->UebungsgruppeID,
            'UebungsID' => $this->UebungsID,
            'Tutor_MarterikelNr' => $this->Tutor_MarterikelNr,
            'Anzahl_der_Personen' => $this->Anzahl_der_Personen,
            'GruppenNr' => $this->GruppenNr,
            'Max_Person' => $this->Max_Person,
        ]);

        return $dataProvider;
    }
}
