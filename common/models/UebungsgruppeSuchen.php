<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Uebungsgruppe;

/**
 * UebungsgruppeSuchen represents the model behind the search form about `common\models\Uebungsgruppe`.
 */
class UebungsgruppeSuchen extends Uebungsgruppe
{
    public function rules()
    {
        return [
            [['UebungsgruppeID', 'UebungsID', 'Tutor_MarterikelNr', 'Anzahl_der_Personen', 'GruppenNr', 'Max_Person'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Uebungsgruppe::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'UebungsgruppeID' => $this->UebungsgruppeID,
            'UebungsID' => $this->UebungsID,
            'Tutor_MarterikelNr' => $this->Tutor_MarterikelNr,
            'Anzahl_der_Personen' => $this->Anzahl_der_Personen,
            'GruppenNr' => $this->GruppenNr,
            'Max_Person' => $this->Max_Person,
        ]);

        return $dataProvider;
    }
    
    /*
     * Übungsgruppe mit ensprechendem Tutor suchen 
     */
    
    public function searchGruppe($params)
    {
        $query = Uebungsgruppe::find()->where(['UebungsID'=>$params]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'UebungsgruppeID' => $this->UebungsgruppeID,
            'UebungsID' => $this->UebungsID,
            'Tutor_MarterikelNr' => $this->Tutor_MarterikelNr,
            'Anzahl_der_Personen' => $this->Anzahl_der_Personen,
            'GruppenNr' => $this->GruppenNr,
            'Max_Person' => $this->Max_Person,
        ]);
        
        return $dataProvider;
    }
    
    /*
     * Übungsgruppe mit ensprechendem Übungsblätter suchen
     */
    
    public function searchUbungsblaetter($params)
    {
        //um die UebungsID herauszukriegen
        $model = Uebungsgruppe::findOne($params);
    
        $query = Uebungsblaetter::find()->where(['UebungsID'=>$model->UebungsID]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
          
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'UebungsgruppeID' => $this->UebungsgruppeID,
            'UebungsID' => $this->UebungsID,
            'Tutor_MarterikelNr' => $this->Tutor_MarterikelNr,
            'Anzahl_der_Personen' => $this->Anzahl_der_Personen,
            'GruppenNr' => $this->GruppenNr,
            'Max_Person' => $this->Max_Person,
        ]);
        
        return $dataProvider;
    }
    
    /*
     * Übungsgruppe mit ensprechendem Tutor suchen
     */
    
    public function searchalleGruppe($params,$id)
    {
        $query = Uebungsgruppe::find()->where(['UebungsID'=>$id]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'UebungsgruppeID' => $this->UebungsgruppeID,
            'UebungsID' => $this->UebungsID,
            'Tutor_MarterikelNr' => $this->Tutor_MarterikelNr,
            'Anzahl_der_Personen' => $this->Anzahl_der_Personen,
            'GruppenNr' => $this->GruppenNr,
            'Max_Person' => $this->Max_Person,
        ]);
        
        return $dataProvider;
    }
    
    /*
     * Übungsgruppe mit ensprechendem Korrektor suchen
     */
    
    public function searchalleGruppeVonKorrektor($params,$id,$korrektorMarterikelNr)
    {
        $query = Uebungsgruppe::find()->where(['UebungsID'=>$id,'Korrektor_MarterikelNr'=>$korrektorMarterikelNr]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'UebungsgruppeID' => $this->UebungsgruppeID,
            'UebungsID' => $this->UebungsID,
            'Tutor_MarterikelNr' => $this->Tutor_MarterikelNr,
            'Anzahl_der_Personen' => $this->Anzahl_der_Personen,
            'GruppenNr' => $this->GruppenNr,
            'Max_Person' => $this->Max_Person,
        ]);
        
        return $dataProvider;
    }
    
    /*
     * Übungsgruppe mit ensprechendem Tutor suchen
     */
    
    public function searchalleGruppeVonTutor($params,$id,$tutorMarterikelNr)
    {
        $query = Uebungsgruppe::find()->where(['UebungsID'=>$id,'Tutor_MarterikelNr'=>$tutorMarterikelNr]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'UebungsgruppeID' => $this->UebungsgruppeID,
            'UebungsID' => $this->UebungsID,
            'Tutor_MarterikelNr' => $this->Tutor_MarterikelNr,
            'Anzahl_der_Personen' => $this->Anzahl_der_Personen,
            'GruppenNr' => $this->GruppenNr,
            'Max_Person' => $this->Max_Person,
        ]);
        
        return $dataProvider;
    }
    
}
