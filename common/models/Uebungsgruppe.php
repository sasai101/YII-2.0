<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uebungsgruppe".
 *
 * @property int $UebungsgruppeID
 * @property int $UebungsID
 * @property int $Tutor_MarterikelNr
 * @property int $Anzahl_der_Personen
 * @property int $GruppenNr
 * @property int $Max_Person
 *
 * @property BenutzerTeilnimmtUebungsgruppe[] $benutzerTeilnimmtUebungsgruppes
 * @property Benutzer[] $benuterMarterikelNrs
 * @property Uebung $uebungs
 * @property Tutor $tutorMarterikelNr
 */
class Uebungsgruppe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uebungsgruppe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // sonst geht das beim Modulherstellung nicht mehr weiter
            //[['UebungsID'], 'required'],
            [['Tutor_MarterikelNr', 'GruppenNr', 'Max_Person'], 'required'],
            [['UebungsID', 'Tutor_MarterikelNr', 'Anzahl_der_Personen', 'GruppenNr', 'Max_Person'], 'integer'],
            [['UebungsID'], 'exist', 'skipOnError' => true, 'targetClass' => Uebung::className(), 'targetAttribute' => ['UebungsID' => 'UebungsID']],
            [['Tutor_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Tutor::className(), 'targetAttribute' => ['Tutor_MarterikelNr' => 'marterikelnr']],
            ['Max_Person', 'Max_PersonCheck'],
            ['GruppenNr', 'GruppenNrCheck']
        ];
    }
    
    public function Max_PersonCheck($attribute, $params){
        if($this->Max_Person < 0){
            $this->addError($attribute,'Anzahl der maximale Person muss immer positive sein.');
        }else if( $this->Max_Person > 1000){
            $this->addError($attribute,'Anzahl der maximale Person muss immer kleiner als 1000 sein.');
        }
    }
    public function GruppenNrCheck($attribute, $params){
        if($this->GruppenNr < 0){
            $this->addError($attribute,'Anzahl der GruppenNr muss immer positive sein.');
        }else if( $this->GruppenNr > 1000){
            $this->addError($attribute,'Anzahl der GruppenNr muss immer kleiner als 1000 sein.');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UebungsgruppeID' => 'Uebungsgruppe ID',
            'UebungsID' => 'Uebungs ID',
            'Tutor_MarterikelNr' => 'Tutor',
            'Anzahl_der_Personen' => 'Anzahl Der  Personen',
            'GruppenNr' => 'Gruppen Nr',
            'Max_Person' => 'Max  Person',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbgabes()
    {
        return $this->hasMany(Abgabe::className(), ['UebungsgruppenID' => 'UebungsgruppeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzerTeilnimmtUebungsgruppes()
    {
        return $this->hasMany(BenutzerTeilnimmtUebungsgruppe::className(), ['UebungsgruppeID' => 'UebungsgruppeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenuterMarterikelNrs()
    {
        return $this->hasMany(Benutzer::className(), ['marterikelnr' => 'Benuter_MarterikelNr'])->viaTable('benutzer_teilnimmt_uebungsgruppe', ['UebungsgruppeID' => 'UebungsgruppeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungs()
    {
        return $this->hasOne(Uebung::className(), ['UebungsID' => 'UebungsID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTutorMarterikelNr()
    {
        return $this->hasOne(Tutor::className(), ['marterikelnr' => 'Tutor_MarterikelNr']);
    }
    
    /*
     *  gibt die URL des Profifotos von Tutor zurück
     */
    public function getProffotoURL($MarterikelNr)
    {
        return Benutzer::findOne($MarterikelNr)->Profiefoto;
    }
    
    /*
     *  gibt die Namen von entsprechendem Tutor zurück
     */
    public function getTutorname($MarterikelNr)
    {
        $model = Benutzer::findOne($MarterikelNr);
        $name = $model->Vorname.' '.$model->Nachname;
        return $name;
    }
    
    /*
     *  giben die gesamte Anzahl der Übungsblätter von entsprechendem Übungen zurück
     */
    public function getUebungsblaetter($UebungsID)
    {
        return Uebungsblaetter::find()->where(['UebungsID'=>$UebungsID])->count();
    }
    
    /*
     * Übungsgruppe in Array zurück (uebung/uebungsecharts)
     */
    public static function AlleUebungsgruppeArray($uebungsID) {
        $modelUebung = Uebung::findOne($uebungsID);
        $gruppen = array();
        foreach ($modelUebung->uebungsgruppes as $gruppe){
            array_push($gruppen, 'Gruppe'.$gruppe->GruppenNr);
        }
        return $gruppen;
    }
    
    
    /*
     *  GesamtePunkte ffür jeden Blatt  (uebungsgruppe/uebungsgruppepiebarecharts)
     */
    public static function GesamtePunktVonJedenBlattArray($uebungsgruppeID, $uebungsblaetterID){
        $allePerson = Uebung::AllerPersonGruppe($uebungsgruppeID);
        $modelAbgabe = Abgabe::find()->where(['UebungsblaetterID'=>$uebungsblaetterID,'UebungsgruppenID'=>$uebungsgruppeID])->all();
        $arrayNote = array();
        foreach ($modelAbgabe as $abgabe){
            foreach ($allePerson as $person){
                if($abgabe->Benutzer_MarterikelNr==$person){
                    array_push($arrayNote, $abgabe->GesamtePunkt);
                }
            }
        }
        
        return $arrayNote;
    }
    
    
    // Uebungsgruppen löschen mit UebungsID
    public static function DeleteUebungsgruppe($uebungsID) {
        $modelUeubngsgruppe = Uebungsgruppe::find()->where(['UebungsID'=>$uebungsID])->all();
        foreach ($modelUeubngsgruppe as $uebungsgruppe){
            BenutzerTeilnimmtUebungsgruppe::DeleteBenutzerTeiUebungsgruppe($uebungsgruppe->UebungsgruppeID);
            $uebungsgruppe->delete();
        }
    }
    
    // Uebungsgruppen löschen mit Tutor MarterikelNr
    public static function DeleteUebungsgruppeMitMarter($marterikelNr) {
        $modelUeubngsgruppe = Uebungsgruppe::find()->where(['Tutor_MarterikelNr'=>$marterikelNr])->all();
        foreach ($modelUeubngsgruppe as $uebungsgruppe){
            BenutzerTeilnimmtUebungsgruppe::DeleteBenutzerTeiUebungsgruppe($uebungsgruppe->UebungsgruppeID);
            Abgabe::DeleteAbgabeMitGruppeID($uebungsgruppe->UebungsgruppeID);
            $uebungsgruppe->delete();
        }
    }
    
    /*
     * Anzahl der unkorregierte Abgabe in Gruppe
     */
    public static function AnzahlUnkorreigiteGruppe($uebungsgruppeID) {
        $modelGruppe = Uebungsgruppe::findOne($uebungsgruppeID);
        $anzahl = 0;
        foreach ($modelGruppe->abgabes as $abgabe){
            if($abgabe->GesamtePunkt ==null){
                $anzahl++;
            }
        }
        return $anzahl;
    }
    
    /*
     * Anzahl der unkorregierte Abgabe in Gruppe und Uebungsblatt
     */
    public static function AnzahlUnkorreigiteUebungsblatt($uebungsgruppeID, $uebungsblaetterID) {
        $modelAbgabe = Abgabe::find()->where(['UebungsblaetterID'=>$uebungsblaetterID, 'UebungsgruppenID'=>$uebungsgruppeID])->all();
        $anzahl = 0;
        foreach ($modelAbgabe as $abgabe){
            if($abgabe->GesamtePunkt ==null){
                $anzahl++;
            }
        }
        return $anzahl;
    }
}
