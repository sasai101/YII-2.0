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
            [['KlausurID', 'Mitarbeiter_MarterikelNr', 'ModulID', 'Kreditpunkt', 'Max_Punkte', 'punkt1_0', 'punkt1_3', 'punkt1_7', 'punkt2_0', 'punkt2_3', 'punkt3_0', 'punkt3_3', 'punkt3_7', 'punkt4_0'], 'integer'],
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
        //finde die entsprechende Klausur für jeweilige Modul
        $query = Klausur::find()->where(['ModulID'=>$params]);

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
            'punkt1_0' => $this->punkt1_0,
            'punkt1_3' => $this->punkt1_3,
            'punkt1_7' => $this->punkt1_7,
            'punkt2_0' => $this->punkt2_0,
            'punkt2_3' => $this->punkt2_3,
            'punkt3_0' => $this->punkt3_0,
            'punkt3_3' => $this->punkt3_3,
            'punkt3_7' => $this->punkt3_7,
            'punkt4_0' => $this->punkt4_0,
        ]);

        $query->andFilterWhere(['like', 'Pruefungsdatum', $this->Pruefungsdatum])
            ->andFilterWhere(['like', 'Raum', $this->Raum])
            ->andFilterWhere(['like', 'Bezeichnung', $this->Bezeichnung]);

        return $dataProvider;
    }
    
    public function searchAlle($params)
    {
        //Alle Klausur
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
            'punkt1_0' => $this->punkt1_0,
            'punkt1_3' => $this->punkt1_3,
            'punkt1_7' => $this->punkt1_7,
            'punkt2_0' => $this->punkt2_0,
            'punkt2_3' => $this->punkt2_3,
            'punkt3_0' => $this->punkt3_0,
            'punkt3_3' => $this->punkt3_3,
            'punkt3_7' => $this->punkt3_7,
            'punkt4_0' => $this->punkt4_0,
        ]);
        
        $query->andFilterWhere(['like', 'Pruefungsdatum', $this->Pruefungsdatum])
        ->andFilterWhere(['like', 'Raum', $this->Raum])
        ->andFilterWhere(['like', 'Bezeichnung', $this->Bezeichnung]);
        
        return $dataProvider;
    }
}
