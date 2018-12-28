<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "klausurnote".
 *
 * @property int $KlausurnoteID
 * @property int $Mitarbeiter_MarterikelNr
 * @property int $Benutzer_MarterikelNr
 * @property double $Note
 * @property double $Punkt
 * @property int $KorregierteZeit
 * @property int $KlausurID
 *
 * @property Benutzer $benutzerMarterikelNr
 * @property Mitarbeiter $mitarbeiterMarterikelNr
 * @property Klausur $klausur
 */
class Klausurnote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'klausurnote';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Mitarbeiter_MarterikelNr', 'Benutzer_MarterikelNr', 'KlausurID'], 'required'],
            [['Mitarbeiter_MarterikelNr', 'Benutzer_MarterikelNr', 'KorregierteZeit', 'KlausurID'], 'integer'],
            [['Note'], 'number'],
            [['Benutzer_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['Benutzer_MarterikelNr' => 'marterikelnr']],
            [['Mitarbeiter_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Mitarbeiter::className(), 'targetAttribute' => ['Mitarbeiter_MarterikelNr' => 'marterikelnr']],
            [['KlausurID'], 'exist', 'skipOnError' => true, 'targetClass' => Klausur::className(), 'targetAttribute' => ['KlausurID' => 'klausurid']],
            
            //
            [['Punkt'], "NotenGrenzen"],
        ];
    }
    
    /*
     *  Validieren, um PUnktzahl zu uberprufen
     */
    public function NotenGrenzen($attribute, $params)
    {
        $modelKlausur = Klausur::findOne($this->KlausurID);
        
        if(!is_int($this->Punkt)){
            
            if($this->Punkt > $modelKlausur->Max_Punkte || $this->Punkt < 0){
                $this->addError($attribute,"Punkt muss zwischen ".$modelKlausur->Max_Punkte." und 0 sein");
            }
        }else {
            $this->addError($attribute,"1Punkt muss ein Zahl zwischen ".$modelKlausur->Max_Punkte." und 0 sein");
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KlausurnoteID' => 'Klausurnote ID',
            'Mitarbeiter_MarterikelNr' => 'Korrektor',
            'Benutzer_MarterikelNr' => 'Benutzer_MarterikelNr',
            'Note' => 'Note',
            'Punkt' => 'Punkte',
            'KorregierteZeit' => 'Korregierte Zeit',
            'KlausurID' => 'Klausur',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzerMarterikelNr()
    {
        return $this->hasOne(Benutzer::className(), ['marterikelnr' => 'Benutzer_MarterikelNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMitarbeiterMarterikelNr()
    {
        return $this->hasOne(Mitarbeiter::className(), ['marterikelnr' => 'Mitarbeiter_MarterikelNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKlausur()
    {
        return $this->hasOne(Klausur::className(), ['klausurid' => 'KlausurID']);
    }
    
    /*
     * weitere Attribute
     */
    public function getVorname() 
    {    
        return $this->benutzerMarterikelNr->Vorname;
    }
    
    public function getNachname()
    {
        return $this->benutzerMarterikelNr->Nachname;
    }

    /*test
     * die befrsave Funktion umschreiben ,damit die Datum richtig und automatisch gespeichert zu werden
     */
    public function beforeSave($insert)
    {
        
        // die orignale Funktion erstmal durchfueren,
        if(parent::beforeSave($insert))
        {
            
            $this->KorregierteZeit = time();
            $this->Mitarbeiter_MarterikelNr = Yii::$app->user->identity->MarterikelNr;
            
            $model = Klausur::findOne($this->KlausurID);
            
            if($this->Punkt >= $model->punkt1_0 && $this->Punkt <= $model->Max_Punkte){
                
                $this->Note = 1.0;
            }else if($this->Punkt >= $model->punkt1_3 && $this->Punkt <= $model->punkt1_0){
                $this->Note = 1.3;
            }else if($this->Punkt >= $model->punkt1_7 && $this->Punkt <= $model->punkt1_3){
                $this->Note = 1.7;
            }else if($this->Punkt >= $model->punkt2_0 && $this->Punkt <= $model->punkt1_7){
                $this->Note = 2.0;
            }else if($this->Punkt >= $model->punkt2_3 && $this->Punkt <= $model->punkt2_0){
                $this->Note = 2.3;
            }else if($this->Punkt >= $model->punkt2_7 && $this->Punkt <= $model->punkt2_3){
                $this->Note = 2.7;
            }else if($this->Punkt >= $model->punkt3_0 && $this->Punkt <= $model->punkt2_7){
                $this->Note = 3.0;
            }else if($this->Punkt >= $model->punkt3_3 && $this->Punkt <= $model->punkt3_0){
                $this->Note = 3.3;
            }else if($this->Punkt >= $model->punkt3_7 && $this->Punkt <= $model->punkt3_3){
                $this->Note = 3.7;
            }else if($this->Punkt >= $model->punkt4_0 && $this->Punkt <= $model->punkt3_7){
                $this->Note = 4.0;
            }else if($this->Punkt < $model->punkt4_0){
                $this->Note = 5.0;
            }

            return true;
        }
        else
        {
            return false;
        }
    } 
}
