<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Mitarbeiter;

/**
 * MitarbeiterSuchen represents the model behind the search form about `common\models\Mitarbeiter`.
 */
class MitarbeiterSuchen extends Mitarbeiter
{
    
    
    /*
     * eine neue Attribute einfügen, um die Suchfunktion zu schaffen
     */
    public function attributes()
    {
        return array_merge(parent::attributes(),['benutzername','email','vorname','nachname']);    
    }
    
    public function rules()
    {
        return [
            [['MarterikelNr'], 'integer'],
            //[['Buero'], 'safe'],
            //neue Regel für hinzufügende Attribute
            [['benutzername','vorname','nachname','email'],'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Mitarbeiter::find();
        
        
        // join Funktion,um die Mitarbeitertabelle und Benutzertabelle zu verbinden, dann suchen und sortieren
        $query->join('INNER JOIN','Benutzer','Benutzer.MarterikelNr=Mitarbeiter.MarterikelNr');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            // wie viel Inhalt pro Seite einzustellen
            'pagination' => [
                'pageSize'=>20
            ],
            // Sortieren nach folgende Attribute
            'sort' => [
                'defaultOrder' => [
                    'MarterikelNr' => SORT_ASC,
                ],
                'attributes' => [
                    'MarterikelNr',
                    'vorname',
                    'nachname',
                    'benutzername',
                ],
            ],
        ]);

        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        
        $query->andFilterWhere([
            'Mitarbeiter.MarterikelNr' => $this->MarterikelNr,
        ]);
        

        //$query->andFilterWhere(['like','Mitarbeiter.MarterikelNr',$this->MarterikelNr])
        //$query->andFilterWhere(['like', 'Buero', $this->Buero]);
        
        //Such nach gegebene Wort in joinene Tabelle
        $query->andFilterWhere(['like','Benutzer.Benutzername',$this->benutzername])
              ->andFilterWhere(['like','Benutzer.email',$this->email])
              ->andFilterWhere(['like','Benutzer.Vorname',$this->vorname])
              ->andFilterWhere(['like','Benutzer.Benutzername',$this->nachname]);

        return $dataProvider;
    }
    
    public function searchListview($params)
    {
        $query = Mitarbeiter::find();
        
        // join Funktion,um die Mitarbeitertabelle und Benutzertabelle zu verbinden, dann suchen und sortieren
        $query->join('INNER JOIN','Benutzer','Benutzer.MarterikelNr=Mitarbeiter.MarterikelNr');
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            // wie viel Inhalt pro Seite einzustellen
            'pagination' => [
                'pageSize'=>50
            ],
            // Sortieren nach folgende Attribute
            'sort' => [
                'defaultOrder' => [
                    'MarterikelNr' => SORT_ASC,
                ],
            ],
        ]);
        
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like','Benutzer.Benutzername',$this->benutzername]);
     
        return $dataProvider;
    }
}
