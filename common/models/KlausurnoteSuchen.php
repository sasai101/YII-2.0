<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Klausurnote;

/**
 * KlausurnoteSuchen represents the model behind the search form about `common\models\Klausurnote`.
 */
class KlausurnoteSuchen extends Klausurnote
{
    public function rules()
    {
        return [
            [['KlausurnoteID', 'Mitarbeiter_MarterikelNr', 'Benutzer_MarterikelNr', 'Note', 'KorregierteZeit'], 'integer'],
            [['Bezeichnung', 'Punkt'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Klausurnote::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'KlausurnoteID' => $this->KlausurnoteID,
            'Mitarbeiter_MarterikelNr' => $this->Mitarbeiter_MarterikelNr,
            'Benutzer_MarterikelNr' => $this->Benutzer_MarterikelNr,
            'Note' => $this->Note,
            'KorregierteZeit' => $this->KorregierteZeit,
        ]);

        $query->andFilterWhere(['like', 'Bezeichnung', $this->Bezeichnung])
            ->andFilterWhere(['like', 'Punkt', $this->Punkt]);

        return $dataProvider;
    }
}
