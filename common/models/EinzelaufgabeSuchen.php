<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Einzelaufgabe;

/**
 * EinzelaufgabeSuchen represents the model behind the search form about `common\models\Einzelaufgabe`.
 */
class EinzelaufgabeSuchen extends Einzelaufgabe
{
    public function rules()
    {
        return [
            [['EinzelaufgabeID', 'AbgabeID', 'UebungsblaetterID', 'AufgabeNr', 'Max.Punkt'], 'integer'],
            [['Text', 'Datein', 'Punkte', 'Bewertung'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Einzelaufgabe::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'EinzelaufgabeID' => $this->EinzelaufgabeID,
            'AbgabeID' => $this->AbgabeID,
            'UebungsblaetterID' => $this->UebungsblaetterID,
            'AufgabeNr' => $this->AufgabeNr,
            'Max.Punkt' => $this->Max.Punkt,
        ]);

        $query->andFilterWhere(['like', 'Text', $this->Text])
            ->andFilterWhere(['like', 'Datein', $this->Datein])
            ->andFilterWhere(['like', 'Punkte', $this->Punkte])
            ->andFilterWhere(['like', 'Bewertung', $this->Bewertung]);

        return $dataProvider;
    }
}
