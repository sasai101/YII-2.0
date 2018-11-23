<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Korrektor;

/**
 * KorrektorSuchen represents the model behind the search form about `common\models\Korrektor`.
 */
class KorrektorSuchen extends Korrektor
{
    
    /*
     * neue Attribute für Suchfunktion hinzuügen
     */
    public function attributes()
    {
        return array_merge(parent::attributes(),['benutzername','vorname','nachname','email']);
    }
    
    
    public function rules()
    {
        return [
            [['MarterikelNr'], 'integer'],
            //regeln die neue hinzufügende Attributes
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
        $query = Korrektor::find();
        
        //join die Korrektortabelle mit Benutzertabelle,
        $query->join('INNER JOIN','Benutzer','Benutzer.MarterikelNr=Korrektor.MarterikelNr');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'Korrektor.MarterikelNr' => $this->MarterikelNr,
        ]);
        $query->andFilterWhere(['like','Benutzer.Benutzername',$this->benutzername])
              ->andFilterWhere(['like','Benutzer.email',$this->email])
              ->andFilterWhere(['like','Benutzer.Vorname',$this->vorname])
              ->andFilterWhere(['like','Benutzer.Benutzername',$this->nachname]);

        return $dataProvider;
    }
}
