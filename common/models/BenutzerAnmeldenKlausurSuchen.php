<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BenutzerAnmeldenKlausur;

/**
 * BenutzerAnmeldenKlausurSuchen represents the model behind the search form about `common\models\BenutzerAnmeldenKlausur`.
 */
class BenutzerAnmeldenKlausurSuchen extends BenutzerAnmeldenKlausur
{
    public function rules()
    {
        return [
            [['Benutzer_MarterikelNr'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = BenutzerAnmeldenKlausur::find()->where(['klausurID'=>$params]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize'=>150
            ],
            'sort' => [
                'defaultOrder' => [
                    'Benutzer_MarterikelNr' => SORT_ASC,
                ],
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'Benutzer_MarterikelNr' => $this->Benutzer_MarterikelNr,
            'KlausurID' => $this->KlausurID,
            'Anmeldungszeit' => $this->Anmeldungszeit,
        ]);


        return $dataProvider;
    }
}
