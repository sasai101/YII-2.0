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
    
    /*
     * eine neue Attribute einfügen, um die Suchfunktion zu schaffen
     */
    public function attributes()
    {
        return array_merge(parent::attributes(),['benutzername','vorname','nachname']);
    }
    
    public function rules()
    {
        return [
            [['KlausurnoteID', 'Benutzer_MarterikelNr'], 'integer'],
            [['Bezeichnung'], 'safe'],
            [['benutzername','vorname','nachname','punkt'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Klausurnote::find()->where(['KlausurID'=>$params]);
        
        $query->join('INNER JOIN','Benutzer','Benutzer.MarterikelNr=Klausurnote.Benutzer_MarterikelNr');
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            // wie viel Inhalt pro Seite einzustellen
            'pagination' => [
                'pageSize'=>50
            ],
            // Sortieren nach folgende Attribute
            'sort' => [
                'defaultOrder' => [
                    'vorname' => SORT_ASC,
                ],
                'attributes' => [
                    'Benutzer_MarterikelNr',
                    'vorname',
                    'nachname',
                    'punkt',
                    'Bezeichnung'
                ],
            ],
        ]);
        

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'KlausurnoteID' => $this->KlausurnoteID,
            'Mitarbeiter_MarterikelNr' => $this->Mitarbeiter_MarterikelNr,
            'Benutzer_MarterikelNr' => $this->Benutzer_MarterikelNr,
            
        ]);

        $query->andFilterWhere(['like','Benutzer.Benutzername',$this->benutzername])
            ->andFilterWhere(['like','punkt',$this->Punkt])
            ->andFilterWhere(['like','Benutzer.Vorname',$this->vorname])
            ->andFilterWhere(['like','Benutzer.Benutzername',$this->nachname]);

        return $dataProvider;
    }
}
