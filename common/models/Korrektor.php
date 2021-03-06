<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "korrektor".
 *
 * @property int $MarterikelNr
 *
 * @property Abgabe[] $abgabes
 * @property Benutzer $marterikelNr
 */
class Korrektor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'korrektor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MarterikelNr'], 'required'],
            [['MarterikelNr'], 'integer'],
            [['MarterikelNr'], 'unique'],
            [['MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['MarterikelNr' => 'marterikelnr']],
       
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MarterikelNr' => 'Marterikel Nr',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbgabes()
    {
        return $this->hasMany(Abgabe::className(), ['Korrektor_MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarterikelNr()
    {
        return $this->hasOne(Benutzer::className(), ['marterikelnr' => 'MarterikelNr']);
    }
    
    /*
     *  Durch die eigene Getter-Funktion die folgende Werte rauszuholen, für index des Korrektores 
     */
    public function getBenutzername()
    {
        return $this->marterikelNr->Benutzername;
    }
    
    public function getVorname()
    {
        return $this->marterikelNr->Vorname;
    }
    
    public function getNachname()
    {
        return $this->marterikelNr->Nachname;
    }
    
    public function getEmail()
    {
        return $this->marterikelNr->email;
    }
    
    public function getProfiefoto()
    {
        return $this->marterikelNr->Profiefoto;
    }
    /*
     * bis her
     */
    
    
    /*
     *  Anzahl der korrigierte Abgabe und Übungsbezeichnung in Array (korrektor/view)
     */
    public static function AnzahlKorrigierteUebung($korrektorID) {
        
        $modelAbgabe = Abgabe::find()->where(['Korrektor_MarterikelNr'=>$korrektorID])->all();
        $alleKorrigierteAbgabe = array();
        
        foreach ($modelAbgabe as $abgabe){
            array_push($alleKorrigierteAbgabe, $abgabe->uebungsblaetter->uebungs->Bezeichnung);
        }
        return array_count_values($alleKorrigierteAbgabe);
    }
    
    /*
     *  Anzahl der korregierte Abgabe und Datum (korrektuor/view)
     */
    public static function KorregierteZeitInArray($korrektorID) {
        
        $modelAbgabe = Abgabe::find()->where(['Korrektor_MarterikelNr'=>$korrektorID])->all();
        $arrayZeit = array();
        foreach ($modelAbgabe as $abgabe){
            array_push($arrayZeit, date('d.m.y',$abgabe->KorregierteZeit));
        }
        return array_count_values($arrayZeit);
    }
    
    /*
     *  Alle Datum in Array Form zurückgeben (korrektuor/view)
     */
    public static function DatumArray($korrektorID) {
        $datums = Korrektor::KorregierteZeitInArray($korrektorID);
        $datumArray = array();
        foreach ($datums as $key=>$datum){
            array_push($datumArray, $key);
        }
        return $datumArray;
    }
    
    /*
     * Anzahl der korriegte Abgabe bei bestimmten Datum in Array zuruck geben (korrektur/view)
     */
    public static function AnzahlArray($korrektorID) {
        $anzahs = Korrektor::KorregierteZeitInArray($korrektorID);
        $anzahlArray = array();
        foreach ($anzahs as $zahl){
            array_push($anzahlArray, $zahl);
        }
        return $anzahlArray;
    }
    
    /*
     *  Array für Echarts pie (korrektor/view)
     */
    public static function PieArrray($korrektorID) {
        $model = Korrektor::AnzahlKorrigierteUebung($korrektorID);
        $pieArray = array();
        foreach($model as $key=>$item){
            array_push($pieArray, array('value'=>$item,'name'=>$key));
        }
        return $pieArray;
    }
    
    public static function DeleteKorrektor($marterikelNr){
        Abgabe::DeleteAbgabeMitKorretorMar($marterikelNr);
        Uebungsgruppe::DeleteUebungsgruppeMitKorrektor($marterikelNr);
        Korrektor::DeletAuthAssignment($marterikelNr);
    }
    
    /*
     * git Vorname von allen Korrektor zurück für Dropdownlist bei ModulCreate
     */
    public static function KorrektorName() {
        
        $model = Benutzer::find();
        
        return $model->join('INNER JOIN','korrektor','benutzer.MarterikelNr=korrektor.MarterikelNr')
        ->select(['Benutzer.Vorname','Benutzer.MarterikelNr'])
        ->indexBy('MarterikelNr')
        ->column();
    }
    
    /*
     * Unkorrigierte Abgabe von Korrektor
     */
    public static function AnzahlUnkorregiertAbgabe($marterikelNr){
        $model = Uebungsgruppe::find()->where(['Korrektor_MarterikelNr'=>$marterikelNr])->all();
        $anzahl = 0;
        foreach ($model as $gruppe){
            $anzahl += Uebungsgruppe::AnzahlUnkorreigiteGruppe($gruppe->UebungsgruppeID);
        }
        return $anzahl;
    }
    
    /*
     * Alle Übungsgruppe von Korrektor
     */
    public static function AlleUebungsgruppe($marterikelNr){
        return Uebungsgruppe::find()->where(['Korrektor_MarterikelNr'=>$marterikelNr])->all();
    }
    
    /*
     * Delete aus AuthAssignment
     */
    public static function DeletAuthAssignment($marterikelNr) {
        AuthAssignment::findOne('korr',$marterikelNr)->delete();
    }
    
}
