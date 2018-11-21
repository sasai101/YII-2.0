<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BenutzerAnmeldenKlausur;

/**
 * BenutzerAnmeldenKlausurSuchen represents the model behind the search form about `common\models\BenutzerAnmeldenKlausur`.
 */
class BenutzerAnmeldenKlausurSuchen extends BenutzerAnmeldenKlausur
{
    public function rules()
    {
        return [
            [['Benutzer_MarterikelNr', 'KlausurID', 'Anmeldungszeit'], 'integer'],
            [['Anmeldungsstatus'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = BenutzerAnmeldenKlausur::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'Benutzer_MarterikelNr' => $this->Benutzer_MarterikelNr,
            'KlausurID' => $this->KlausurID,
            'Anmeldungszeit' => $this->Anmeldungszeit,
        ]);

        $query->andFilterWhere(['like', 'Anmeldungsstatus', $this->Anmeldungsstatus]);

        return $dataProvider;
    }
}
