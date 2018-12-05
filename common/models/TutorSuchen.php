<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Tutor;

/**
 * TutorSuchen represents the model behind the search form about `common\models\Tutor`.
 */
class TutorSuchen extends Tutor
{
    
    public function attributes()
    {
        return array_merge(parent::attributes(),['benutzername','email','vorname','nachname']);
    }
    
    public function rules()
    {
        return [
            [['MarterikelNr'], 'integer'],
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
        $query = Tutor::find();

        // join Funktion,um die Mitarbeitertabelle und Benutzertabelle zu verbinden, dann suchen und sortieren
        $query->join('INNER JOIN','Benutzer','Benutzer.MarterikelNr=Tutor.MarterikelNr');
        
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
            'Tutor.MarterikelNr' => $this->MarterikelNr,
        ]);
        
        $query->andFilterWhere(['like','Benutzer.Benutzername',$this->benutzername])
        ->andFilterWhere(['like','Benutzer.email',$this->email])
        ->andFilterWhere(['like','Benutzer.Vorname',$this->vorname])
        ->andFilterWhere(['like','Benutzer.Benutzername',$this->nachname]);
        

        return $dataProvider;
    }
    
    public function searchListview($params)
    { 
        $query = Tutor::find();
        
        // join Funktion,um die Mitarbeitertabelle und Benutzertabelle zu verbinden, dann suchen und sortieren
        $query->join('INNER JOIN','Benutzer','Benutzer.MarterikelNr=Tutor.MarterikelNr');
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            // wie viel Inhalt pro Seite einzustellen
            'pagination' => [
                'pageSize'=>50
            ],
            
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        
        $query->andFilterWhere(['like','Benutzer.Benutzername',$this->benutzername]);
        
        return $dataProvider;
    }
}
