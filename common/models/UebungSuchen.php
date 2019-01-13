<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Uebung;

/**
 * UebungSuchen represents the model behind the search form about `common\models\Uebung`.
 */
class UebungSuchen extends Uebung
{
    public function rules()
    {
        return [
            [['UebungsID', 'ModulID', 'Mitarbeiter_MarterikelNr'], 'integer'],
            [['Bezeichnung'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Uebung::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'UebungsID' => $this->UebungsID,
            'ModulID' => $this->ModulID,
            'Mitarbeiter_MarterikelNr' => $this->Mitarbeiter_MarterikelNr,
        ]);

        $query->andFilterWhere(['like', 'Bezeichnung', $this->Bezeichnung]);

        return $dataProvider;
    }
    
    public function searchMitarbeiter($params,$marterikelNr)
    {
        $query = Uebung::find()->where(['Mitarbeiter_MarterikelNr'=>$marterikelNr]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'UebungsID' => $this->UebungsID,
            'ModulID' => $this->ModulID,
            'Mitarbeiter_MarterikelNr' => $this->Mitarbeiter_MarterikelNr,
        ]);
        
        $query->andFilterWhere(['like', 'Bezeichnung', $this->Bezeichnung]);
        
        return $dataProvider;
    }
}
