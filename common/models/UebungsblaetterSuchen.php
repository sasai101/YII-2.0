<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Uebungsblaetter;

/**
 * UebungsblaetterSuchen represents the model behind the search form about `common\models\Uebungsblaetter`.
 */
class UebungsblaetterSuchen extends Uebungsblaetter
{
    public function rules()
    {
        return [
            [['UebungsblatterID', 'UebungsID', 'UebungsNr', 'Anzahl_der_Aufgabe', 'Deadline', 'Ausgabedatum'], 'integer'],
            [['Datein'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Uebungsblaetter::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'UebungsblatterID' => $this->UebungsblatterID,
            'UebungsID' => $this->UebungsID,
            'UebungsNr' => $this->UebungsNr,
            'Anzahl_der_Aufgabe' => $this->Anzahl_der_Aufgabe,
            'Deadline' => $this->Deadline,
            'Ausgabedatum' => $this->Ausgabedatum,
        ]);

        $query->andFilterWhere(['like', 'Datein', $this->Datein]);

        return $dataProvider;
    }
    /*
     * Neue Suchfunktion für Seite index, damit nur die entsprechende Übung zeigen
     */
    public function searchMitID($params)
    {
        $query = Uebungsblaetter::find()->where(['UebungsID'=>$params]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'UebungsblatterID' => $this->UebungsblatterID,
            'UebungsID' => $this->UebungsID,
            'UebungsNr' => $this->UebungsNr,
            'Anzahl_der_Aufgabe' => $this->Anzahl_der_Aufgabe,
            'Deadline' => $this->Deadline,
            'Ausgabedatum' => $this->Ausgabedatum,
        ]);
        
        $query->andFilterWhere(['like', 'Datein', $this->Datein]);
        
        return $dataProvider;
    }
    
    /*
     * Such die Übungsblätter für passende Übungen
     */
    public function searchUebungsblaetter($params)
    {
        $query = Uebungsgruppe::find()->where(['UebungsgruppeID'=>$params]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'UebungsblatterID' => $this->UebungsblatterID,
            'UebungsID' => $this->UebungsID,
            'UebungsNr' => $this->UebungsNr,
            'Anzahl_der_Aufgabe' => $this->Anzahl_der_Aufgabe,
            'Deadline' => $this->Deadline,
            'Ausgabedatum' => $this->Ausgabedatum,
        ]);
        
        $query->andFilterWhere(['like', 'Datein', $this->Datein]);
        
        return $dataProvider;
    }
    
}
