<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Benutzer;

/**
 * BenutzerSuchen represents the model behind the search form about `common\models\Benutzer`.
 */
class BenutzerSuchen extends Benutzer
{
    public function rules()
    {
        return [
            [['MarterikelNr', 'created_at', 'updated_at'], 'integer'],
            [['email', 'password_hash', 'password_reset_token', 'auth_key', 'Vorname', 'Nachname', 'Benutzername'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Benutzer::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize'=>50
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            //'MarterikelNr' => $this->MarterikelNr,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like','MarterikelNr',$this->MarterikelNr])
            ->andFilterWhere(['like', 'email', $this->email])
            //->andFilterWhere(['like', 'password_hash', $this->password_hash])
            //->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            //->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'Vorname', $this->Vorname])
            ->andFilterWhere(['like', 'Nachname', $this->Nachname])
            ->andFilterWhere(['like', 'Benutzername', $this->Benutzername]);

        return $dataProvider;
    }
}
