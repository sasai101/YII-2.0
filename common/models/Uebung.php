<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "uebung".
 *
 * @property int $UebungsID
 * @property int $ModulID
 * @property int $Mitarbeiter_MarterikelNr
 * @property string $Bezeichnung
 * @property int $Zulassungsgrenze 
 *
 * @property Mitarbeiter $mitarbeiterMarterikelNr
 * @property Modul $modul
 * @property Uebungsblaetter[] $uebungsblaetters
 * @property Uebungsgruppe[] $uebungsgruppes
 */
class Uebung extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uebung';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // sonst geht das beim Modulherstellung nicht mehr weiter
            [['ModulID', 'Mitarbeiter_MarterikelNr', 'Bezeichnung', 'Zulassungsgrenze'], 'required'],
            [['Mitarbeiter_MarterikelNr'], 'required'],
            [['ModulID', 'Mitarbeiter_MarterikelNr', 'Zulassungsgrenze'], 'integer'],
            [['Bezeichnung'], 'string', 'max' => 255],
            [['Mitarbeiter_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Mitarbeiter::className(), 'targetAttribute' => ['Mitarbeiter_MarterikelNr' => 'marterikelnr']],
            [['ModulID'], 'exist', 'skipOnError' => true, 'targetClass' => Modul::className(), 'targetAttribute' => ['ModulID' => 'ModulID']],
            ['Zulassungsgrenze','ZulassungsgrenzePruefen'],
        ];
    }
    // validierung fur Punkte
    public function ZulassungsgrenzePruefen($attribute, $params)
    {
        if ($this->Zulassungsgrenze<0) {
            $this->addError($attribute,'Anzahl der GruppenNr muss immer positive sein.');
        }else if($this->Zulassungsgrenze>100){
            $this->addError($attribute,'Erro');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UebungsID' => 'Uebungs ID',
            'ModulID' => 'Modul ID',
            'Mitarbeiter_MarterikelNr' => 'Mitarbeiter',
            'Bezeichnung' => 'Bezeichnung',
            'Zulassungsgrenze' => 'Zulassungsgrenze', 
        ];
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
    public function getModul()
    {
        return $this->hasOne(Modul::className(), ['ModulID' => 'ModulID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungsblaetters()
    {
        return $this->hasMany(Uebungsblaetter::className(), ['UebungsID' => 'UebungsID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungsgruppes()
    {
        return $this->hasMany(Uebungsgruppe::className(), ['UebungsID' => 'UebungsID']);
    }
    
    /*
     * Gibt den Name von Professor zurück
     */
    public function getBenutzerNname($id)
    {
        $model = Benutzer::findOne($id);
        $Name = $model->Vorname." ".$model->Nachname;
        return  $Name;
    }
    
    
    /*
     * Anzahl der zugelassenen Person(mitarbeiter/view ->_gurppenlistview)
     */
    public static function AnzahlderzugelassenenPerson($uebungsID) {
        $modelUebung = Uebung::findOne($uebungsID);
        $anzahl = 0;
        foreach ($modelUebung->uebungsgruppes as $uebungsgruppe){
            $anzahl += Uebung::AnzahlderzugelassenPersonderGruppe($uebungsgruppe->UebungsgruppeID);
        }
        return $anzahl;
    }
    
    /*
     * Anzahl der zugelassenen Person array(uebung/uebungsecharts)
     */
    public static function AnzahlderzugelassenenPersonArray($uebungsID) {
        $modelUebung = Uebung::findOne($uebungsID);
        $anzahl = array();
        foreach ($modelUebung->uebungsgruppes as $uebungsgruppe){
            array_push($anzahl, Uebung::AnzahlderzugelassenPersonderGruppe($uebungsgruppe->UebungsgruppeID));
        }
        return $anzahl;
    }
    
    /*
     * zugelassenen Person Array(uebung/uebungsecharts)
     */
    public static function AnzahldernichtzugelassenenPersonArray($uebungsID) {
        $modelUebung = Uebung::findOne($uebungsID);
        $anzahl = array();
        foreach ($modelUebung->uebungsgruppes as $uebungsgruppe){
            array_push($anzahl, Uebung::AnzahlAllePersonGruppe($uebungsgruppe->UebungsgruppeID)-Uebung::AnzahlderzugelassenPersonderGruppe($uebungsgruppe->UebungsgruppeID));
        }
        return $anzahl;
    }
    
    /*
     * Anzahl der nicht zugelassenen Person(mitarbeiter/view ->_gurppenlistview)
     */
    public static function AnzahldernichtzugelassenenPerson($uebungsID) {
        return Uebung::AnzahlAllePersonUebung($uebungsID)-Uebung::AnzahlderzugelassenenPerson($uebungsID);
    }
    
    /*
     * zugelassenen Person der jeweiligen Gruppe (mitarbeiter/view ->_gurppenlistview)
     */
    public static function AnzahlderzugelassenPersonderGruppe($uebungsgruppeID) {
        $anzahl = 0;
        $model = Uebungsgruppe::findOne($uebungsgruppeID);
        $modelUebungsgruppe = BenutzerTeilnimmtUebungsgruppe::find()->where(['UebungsgruppeID'=>$uebungsgruppeID])->all();
        foreach ($modelUebungsgruppe as $person){
            $gesamtePunkte = Uebung::GesamtePunktederPerson($uebungsgruppeID, $person->Benuter_MarterikelNr);
            $grenze = Uebung::zulassungsGrenze($model->UebungsID);
            if($gesamtePunkte>=$grenze){
                $anzahl++;
            }
        }
        return $anzahl;
    }
    
    /*
     *  volle Punkt von Uebungsblätter (oben)
     */
    public static function vollePunktderUebung($uebungsID) {
        $modelBlaetter = Uebungsblaetter::find()->where(['UebungsID'=>$uebungsID])->all();
        $vollPunkte = 0;
        foreach ($modelBlaetter as $Blatt){
            $vollPunkte += $Blatt->GesamtePunkte;
        }
        return $vollPunkte;
    }
    
    /*
     * Zulassungsgrenze jeweiliges Übung(Oben)
     */
    public static function zulassungsGrenze($uebungsID) {
        $modelUebung = Uebung::findOne($uebungsID);
        return (($modelUebung->Zulassungsgrenze/100)*Uebung::vollePunktderUebung($uebungsID));
    }  
    
    
    /*
     * Gesamte Punkte für jeweilige Person an bestimmten Übungsgruppe
     */
    public static function GesamtePunktederPerson($uebungsgruppeID, $marterikelNr){
        $punkte = 0;
        $modelAbgabe = Abgabe::find()->where(['Benutzer_MarterikelNr'=>$marterikelNr, 'UebungsgruppenID'=>$uebungsgruppeID])->all();
        foreach ($modelAbgabe as $einzeln){
            $punkte += $einzeln->GesamtePunkt;
        }
        return $punkte;
    }
    
    /*
     *  Alle zugelassenen Person in array bei bestimmten Übungen
     */
    public static function ZugelassenePersonUebung($uebungsID) {
        $modelBlaetter = Uebungsblaetter::find()->where(['UebungsID'=>$uebungsID])->all();
        $vollPunkte = 0;
        foreach ($modelBlaetter as $Blatt){
            $vollPunkte += $Blatt->GesamtePunkte;
        }
        return $vollPunkte;;
    }
    
    /*
     *  Anzahl der Teilnahmer einer bestimmter Übung
     */
    public static function AnzahlAllePersonUebung($uebungsID) {
        $gesamt = 0;
        $model = Uebung::findOne($uebungsID);
        foreach ($model->uebungsgruppes as $gruppe){
            $gesamt += Uebung::AnzahlAllePersonGruppe($gruppe->UebungsgruppeID);
        }
        return $gesamt;
    }
    
    /*
     *  Anzahl der Teilnahmer einer bestimmter Übung
     */
    public static function AnzahlAllePersonGruppe($uebungsgruppeID) {
        return BenutzerTeilnimmtUebungsgruppe::find()->where(['UebungsgruppeID'=>$uebungsgruppeID])->count();
    }
    
    /*
     *  Alle zugelassenen Person in Array bei bestimmten Gruppe
     */
    public static function ZugelassenePersonGruppe($uebungsgruppeID) {
        $allePerson=array();
        $model = Uebungsgruppe::findOne($uebungsgruppeID);
        $modelUebungsgruppe = BenutzerTeilnimmtUebungsgruppe::find()->where(['UebungsgruppeID'=>$uebungsgruppeID])->all();
        foreach ($modelUebungsgruppe as $person){
            $gesamtePunkte = Uebung::GesamtePunktederPerson($uebungsgruppeID, $person->Benuter_MarterikelNr);
            $grenze = Uebung::zulassungsGrenze($model->UebungsID);
            if($gesamtePunkte>=$grenze){
                array_push($allePerson, $person->Benuter_MarterikelNr);
            }
        }
        return $allePerson;;
    }
    
    /*
     * alle zugelassenen Person bei bestimmten Uebung, array 
     */
    public static function ZugelassenenPersonUebung($uebungsID) {
        $modelUebung = Uebung::findOne($uebungsID);
        $allePerson = array();
        foreach ($modelUebung->uebungsgruppes as $uebungsgruppe){
            $allePerson = array_merge($allePerson,Uebung::ZugelassenePersonGruppe($uebungsgruppe->UebungsgruppeID));
        }
        return $allePerson;
    }
    
    
    /*
     * Alle Person von Übung, array
     */
    public static function AllerPersonUebung ($uebungsID) {
        $modelUebung = Uebung::findOne($uebungsID);
        $allePerson = array();
        foreach ($modelUebung->uebungsgruppes as $uebungsgruppe){
            $allePerson = array_merge($allePerson,Uebung::AllerPersonGruppe($uebungsgruppe->UebungsgruppeID));
        }
        return $allePerson;
        
    }
    
    /*
     * Alle Person von Gruppe, array
     */
    public static function AllerPersonGruppe ($uebungsgruppeID) {
        $allePerson=array();
        $model = Uebungsgruppe::findOne($uebungsgruppeID);
        $modelUebungsgruppe = BenutzerTeilnimmtUebungsgruppe::find()->where(['UebungsgruppeID'=>$uebungsgruppeID])->all();
        foreach ($modelUebungsgruppe as $person){
            array_push($allePerson, $person->Benuter_MarterikelNr);
        }
        return $allePerson;;
        
    }
    
    /*
     * gesamte Punkte von jeweiligem Student von bestimmten Gruppe IN Array (ueubngsgruppe/uebungsgrupppebarecharts)
     */
    public static function GesamtePunkteDerPersonInArray($uebungsgruppeID) {
        $PunkteArray = array();
        foreach (Uebung::AllerPersonGruppe($uebungsgruppeID) as $person){
            $Punkte = Uebung::GesamtePunktederPerson($uebungsgruppeID, $person);
            array_push($PunkteArray, $Punkte);
        }
        return $PunkteArray;
    }
    
    // Übungen durch Mitarbeiter MarterikelNr löschen
    public static function DeleteUebungMitMitarbeitMar($marterikelNr) {
        $modelUebung = Uebung::find()->where(['Mitarbeiter_MarterikelNr'=>$marterikelNr])->all();
        foreach ($modelUebung as $uebung){
            Uebungsblaetter::DeleteUebungsblatt($uebung->UebungsID);
            Uebungsgruppe::DeleteUebungsgruppe($uebung->UebungsID);
            $uebung->delete();
        }
    }
}

