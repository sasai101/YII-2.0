<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Abgabe;

/**
 * AbgabeSuchen represents the model behind the search form about `common\models\Abgabe`.
 */
class AbgabeSuchen extends Abgabe
{
    public function rules()
    {
        return [
            [['AbgabeID', 'Benutzer_MarterikelNr', 'Korrektor_MarterikelNr', 'KorregierteZeit', 'AbgabeZeit', 'GesamtePunkt', 'UebungsblaetterID'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Abgabe::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'AbgabeID' => $this->AbgabeID,
            'Benutzer_MarterikelNr' => $this->Benutzer_MarterikelNr,
            'Korrektor_MarterikelNr' => $this->Korrektor_MarterikelNr,
            'KorregierteZeit' => $this->KorregierteZeit,
            'AbgabeZeit' => $this->AbgabeZeit,
            'GesamtePunkt' => $this->GesamtePunkt,
            'UebungsblaetterID' => $this->UebungsblaetterID,
        ]);

        return $dataProvider;
    }
}
