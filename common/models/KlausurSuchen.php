<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Klausur;

/**
 * KlausurSuchen represents the model behind the search form about `common\models\Klausur`.
 */
class KlausurSuchen extends Klausur
{
    public function rules()
    {
        return [
            [['KlausurID', 'Mitarbeiter_MarterikelNr', 'ModulID', 'Kreditpunkt', 'Max_Punkte', '1.0', '1.3', '1.7', '2.0', '2.3', '3.0', '3.3', '3.7', '4.0', '5.0'], 'integer'],
            [['Pruefungsdatum', 'Raum', 'Bezeichnung'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Klausur::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'KlausurID' => $this->KlausurID,
            'Mitarbeiter_MarterikelNr' => $this->Mitarbeiter_MarterikelNr,
            'ModulID' => $this->ModulID,
            'Kreditpunkt' => $this->Kreditpunkt,
            'Max_Punkte' => $this->Max_Punkte,
            '1.0' => $this->1.0,
            '1.3' => $this->1.3,
            '1.7' => $this->1.7,
            '2.0' => $this->2.0,
            '2.3' => $this->2.3,
            '3.0' => $this->3.0,
            '3.3' => $this->3.3,
            '3.7' => $this->3.7,
            '4.0' => $this->4.0,
            '5.0' => $this->5.0,
        ]);

        $query->andFilterWhere(['like', 'Pruefungsdatum', $this->Pruefungsdatum])
            ->andFilterWhere(['like', 'Raum', $this->Raum])
            ->andFilterWhere(['like', 'Bezeichnung', $this->Bezeichnung]);

        return $dataProvider;
    }
}
