<?php

namespace common\models;

use Yii;
use common\widgets\Alert;
use yii\data\ActiveDataProvider;
use yii\db\Query;

/**
 * This is the model class for table "abgabe".
 *
 * @property int $AbgabeID
 * @property int $Benutzer_MarterikelNr
 * @property int $Korrektor_MarterikelNr
 * @property int $KorregierteZeit
 * @property int $AbgabeZeit
 * @property int $GesamtePunkt
 * @property int $UebungsblaetterID
 * @property int $UebungsgruppenID 
 * @property string $Datein
 *
 * @property Benutzer $benutzerMarterikelNr
 * @property Korrektor $korrektorMarterikelNr
 * @property Uebungsblaetter $uebungsblaetter 
 * @property Uebungsgruppe $uebungsgruppen 
 * @property Einzelaufgabe[] $einzelaufgabes
 */
class Abgabe extends \yii\db\ActiveRecord
{
    // Abgabe in zip Datein
    public $file;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'abgabe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Benutzer_MarterikelNr', 'UebungsblaetterID', 'UebungsgruppenID'], 'required'],
            [['Benutzer_MarterikelNr', 'Korrektor_MarterikelNr', 'KorregierteZeit', 'AbgabeZeit', 'GesamtePunkt', 'UebungsblaetterID', 'UebungsgruppenID'], 'integer'],
            [['Datein'], 'string'],
            [['Benutzer_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['Benutzer_MarterikelNr' => 'marterikelnr']],
            [['Korrektor_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Korrektor::className(), 'targetAttribute' => ['Korrektor_MarterikelNr' => 'marterikelnr']],
            [['UebungsblaetterID'], 'exist', 'skipOnError' => true, 'targetClass' => Uebungsblaetter::className(), 'targetAttribute' => ['UebungsblaetterID' => 'uebungsblatterid']],
            [['UebungsgruppenID'], 'exist', 'skipOnError' => true, 'targetClass' => Uebungsgruppe::className(), 'targetAttribute' => ['UebungsgruppenID' => 'uebungsgruppeid']],
            //['GesamtePunkt','GesamtePunktCheck'],
            
            [['file'],'file', 'extensions' => 'zip' ,'checkExtensionByMimeType'=>false],
            
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'AbgabeID' => 'Abgabe ID',
            'Benutzer_MarterikelNr' => 'Marterikel Nr',
            'Korrektor_MarterikelNr' => 'Korrektor',
            'KorregierteZeit' => 'Korregierte Zeit',
            'AbgabeZeit' => 'Abgabe Zeit',
            'GesamtePunkt' => 'Gesamte Punkt',
            'UebungsblaetterID' => 'Übungsblätter',
            'file' => 'Abgabe',
            'Datein' => 'Datein',
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
    public function getKorrektorMarterikelNr()
    {
        return $this->hasOne(Korrektor::className(), ['marterikelnr' => 'Korrektor_MarterikelNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungsblaetter()
    {
        return $this->hasOne(Uebungsblaetter::className(), ['uebungsblatterid' => 'UebungsblaetterID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungsgruppen()
    {
        return $this->hasOne(Uebungsgruppe::className(), ['uebungsgruppeid' => 'UebungsgruppenID']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */ 
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEinzelaufgabes()
    {
        return $this->hasMany(Einzelaufgabe::className(), ['AbgabeID' => 'AbgabeID']);
    }
    
    public function setMarterikelNr($value) {
        $this->Korrektor_MarterikelNr = $value;
    }
    
    
    /*test
     * die befrsave Funktion umschreiben ,damit die Datum richtig und automatisch gespeichert zu werden
     */
    public function beforeSave($insert)
    {
        
        // die orignale Funktion erstmal durchfueren,
        if(parent::beforeSave($insert))
        {
            if(Korrektor::findOne(\Yii::$app->user->identity->MarterikelNr)!=null || Mitarbeiter::findOne(\Yii::$app->user->identity->MarterikelNr)!=null){
                $model = $this->einzelaufgabes;
                $note = 0;
                $flag = true;
                foreach ($model as $aufgabe){
                    if($aufgabe->Punkte==null){
                        $note = 0;
                        return false;
                        break;
                    }else{
                        $note += $aufgabe->Punkte;
                    }
                }
                if( $flag==true){
                    if($note > $this->uebungsblaetter->GesamtePunkte){
                        
                        return false;
                    }elseif ($note < 0){
                        
                        return false;
                    }else{
                        
                        if(Korrektor::findOne(\Yii::$app->user->identity->MarterikelNr)==null){
                            $this->KorregierteZeit = time();
                            $this->GesamtePunkt = $note;
                        }else{
                            $this->KorregierteZeit = time();
                            $this->GesamtePunkt = $note;
                            $this->setMarterikelNr(Yii::$app->user->identity->MarterikelNr);
                        }
                        return true;
                        
                    }
                }
            }else{
                $this->AbgabeZeit = time();
                return true;
            }
        }
        else
        {
            return false;
        }
    } 
    
    /*
     *  Finde alle Aufgabe von einen Bestimmten Benutzer, (Contraolle AbgabeControlle/actionEchartsabgabe, Seite abgabe/echartsabgabe)
     */ 
    public static function alleAbgabe($uebungsID,$marterikelNr) {
        
        $query = Abgabe::find();
        $query->join('INNER JOIN','Uebungsblaetter','Uebungsblaetter.UebungsblatterID=Abgabe.UebungsblaetterID')
        ->select(['Uebungsblaetter.UebungsNr','Abgabe.GesamtePunkt'])
        ->where(['Uebungsblaetter.UebungsID'=>$uebungsID,'Abgabe.Benutzer_MarterikelNr'=>$marterikelNr])
        ->all();
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
    
        return $dataProvider->models;
    }   
    
    /*
     *  Einzelaufgabenpunkte als Array zuruck für eine Abgabe(benutzer/view -> _notelistview)
     */
    public static function einzelAufgabenoteInArray($abgabeID) {
        $modelAbgabe = Abgabe::findOne($abgabeID);
        $note = array();
        foreach ($modelAbgabe->einzelaufgabes as $einzeln){
            array_push($note, $einzeln->Punkte);
        }
        return $note;
    }
    
    /*
     *  EinzelaufgabeNr als Array zurück für eine Abgabe(benutzer/view -> _notelistview)
     */
    public static function einzelAufgabeNrInArray($abgabeID) {
        $modelAbgabe = Abgabe::findOne($abgabeID);
        $aufgabe = array();
        foreach ($modelAbgabe->einzelaufgabes as $einzeln){
            array_push($aufgabe, "Aufgabe ".$einzeln->AufgabeNr);
        }
        return $aufgabe;
    }
    
    /*
     * Nichte bekommte Punkte (runter)
     */
    public static function nichtbekommtPunkt($abgabeID) {
        $model = Abgabe::findOne($abgabeID);
        $vollpunkte = $model->uebungsblaetter->GesamtePunkte;
        $gesamtepunkte = 0;
        foreach (Abgabe::einzelAufgabenoteInArray($abgabeID) as $note){
            $gesamtepunkte += $note;
        }
        return array("value"=>$vollpunkte-$gesamtepunkte, "name"=>"Falsche ");
    }
    
    /*
     *  als Echartspie Form zuruck (benutzer/view -> _notelistview)
     */  
    public static function ArrayEchertsPieForm($abgabeID) {
        
        $note = Abgabe::einzelAufgabenoteInArray($abgabeID);
        $aufgabe = Abgabe::einzelAufgabeNrInArray($abgabeID);
        
        $arrayEchart = array();
        
        foreach ($note as $key1=>$einzel1){
            foreach ($aufgabe as $key2=>$einzel2){
                if($key1==$key2){
                    $array=array("value"=>$einzel1, "name"=>$einzel2);
                    array_push($arrayEchart, $array);
                }
            }
        }
        //nichte bekommte Punkte
        array_push($arrayEchart, Abgabe::nichtbekommtPunkt($abgabeID));
        
        return $arrayEchart;
    }
    
    /*
     * Anzahl, wer die Abgabe nicht abgegeben haben, Tutor/view ->_gruppeblaetterlistview
     */
    public static function AnzahlWerNichtAbgeben($uebungsblaetterID, $uebungsgruppeID) {
        $modelUebungsblatt = Uebungsblaetter::findOne($uebungsblaetterID);
        $modelAbgabe = Abgabe::find()->where(['UebungsblaetterID'=>$uebungsblaetterID, 'UebungsgruppenID'=>$uebungsgruppeID])->all();
        $anzahl = 0;
        $leeraufgabe = 0;
        foreach ($modelAbgabe as $abgabe){
            foreach ($abgabe->einzelaufgabes as $einzel){
                if($einzel->Text==NULL && $abgabe->Datein==NULL){
                    $leeraufgabe += 1;
                }
            }
            if($leeraufgabe == $modelUebungsblatt->Anzahl_der_Aufgabe){
                $anzahl += 1;
            }
            $leeraufgabe = 0;
        }
        return $anzahl;
    }
    
    /*
     *  Anzahl, wer die Abgabe abgegeben haben, Tutor/view ->_gruppeblaetterlistview
     */
    public static function AnzahlWerAbgeben($uebungsblaetterID, $uebungsgruppeID) {
        $AlleAbgabe = Abgabe::find()->where(['UebungsblaetterID'=>$uebungsblaetterID, 'UebungsgruppenID'=>$uebungsgruppeID])->count();
        return $AlleAbgabe-Abgabe::AnzahlWerNichtAbgeben($uebungsblaetterID, $uebungsgruppeID);
    }
    
    
    //Abgabe löschen mit UebungsblaetterID
    public static function DeleteAbgabe($uebungsblaetterID) {
        $modelAbgabe = Abgabe::find()->where(['UebungsblaetterID'=>$uebungsblaetterID])->all();
        foreach ($modelAbgabe as $abgabe){
            foreach ($abgabe->einzelaufgabes as $einzel){
                $einzel->delete();
            }
            $abgabe->delete();
        }
    }
    
    //Abgabe löschen mit BenutzerMarterikelNr
    public static function DeleteAbgabeMitMarterikelNr($marterikelNr) {
        $modelAbgabe = Abgabe::find()->where(['Benutzer_MarterikelNr'=>$marterikelNr])->all();
        foreach ($modelAbgabe as $abgabe){
            foreach ($abgabe->einzelaufgabes as $einzel){
                $einzel->delete();
            }
            $abgabe->delete();
        }
    }
    
    //Abgabe löschen mit GruppeID
    public static function DeleteAbgabeMitGruppeID($uebungsgruppeID) {
        $modelAbgabe = Abgabe::find()->where(['UebungsgruppenID'=>$uebungsgruppeID])->all();
        foreach ($modelAbgabe as $abgabe){
            foreach ($abgabe->einzelaufgabes as $einzel){
                $einzel->delete();
            }
            $abgabe->delete();
        }
    }
    
    //Abgabe löschen mit Korrektor MarterikelNr
    public static function DeleteAbgabeMitKorretorMar($marterikelNr) {
        $modelAbgabe = Abgabe::find()->where(['Korrektor_MarterikelNr'=>$marterikelNr])->all();
        foreach ($modelAbgabe as $abgabe){
            foreach ($abgabe->einzelaufgabes as $einzel){
                $einzel->delete();
            }
            $abgabe->delete();
        }
    }
    
    /*
     * Abgabe alle note in Array_value_count (uebungsblaetter/abgabestatus)
     */
    public static function AlleNoteInArray($uebungsblaetterID) {
        $modelAbgabe = Abgabe::find()->where(['UebungsblaetterID'=>$uebungsblaetterID])->all();
        $allenoteArray = array();
        foreach ($modelAbgabe as $abgabe){
            array_push($allenoteArray, (int)($abgabe->GesamtePunkt*100));
        }
        sort($allenoteArray);
        return array_count_values($allenoteArray);
    }
    
    /*
     * Anzahl der Person mitbestimmen Punkte (uebungsblaetter/abgabestatus)
     */
    public static function AnzahlderPrersonMitPunkt($uebungsblaetterID){
        $array = Abgabe::AlleNoteInArray($uebungsblaetterID);
        $arrayAnzahl = array();
        foreach ($array as $item){
            array_push($arrayAnzahl, $item);
        }
        return $arrayAnzahl;
    }
    
    /*
     * Anzahl punkte Zahl (uebungsblaetter/abgabestatus)
     */
    public static function AllePunkteZahl($uebungsblaetterID){
        $array = Abgabe::AlleNoteInArray($uebungsblaetterID);
        $arrayAnzahl = array();
        foreach ($array as $key=>$item){
            array_push($arrayAnzahl, ((double)$key)/100);
        }
        return $arrayAnzahl;
    }
    
    /*
     * Anzahl, wer die Abgabe nicht abgegeben haben, (uebungsblaetter/abgabestatus)
     */
    public static function AlleAnzahlNichtAbgeben($uebungsblaetterID) {
        $modelUebungsblatt = Uebungsblaetter::findOne($uebungsblaetterID);
        $modelAbgabe = Abgabe::find()->where(['UebungsblaetterID'=>$uebungsblaetterID])->all();
        $anzahl = 0;
        $leeraufgabe = 0;
        foreach ($modelAbgabe as $abgabe){
            foreach ($abgabe->einzelaufgabes as $einzel){
                if($einzel->Text==NULL && $abgabe->Datein==NULL){
                    $leeraufgabe += 1;
                }
            }
            if($leeraufgabe == $modelUebungsblatt->Anzahl_der_Aufgabe){
                $anzahl += 1;
            }
            $leeraufgabe = 0;
        }
        return $anzahl;
    }
    
    /*
     *  Anzahl, wer die Abgabe abgegeben haben, (uebungsblaetter/abgabestatus)
     */
    public static function AlleAnzahlAbgeben($uebungsblaetterID) {
        $AlleAbgabe = Abgabe::find()->where(['UebungsblaetterID'=>$uebungsblaetterID])->count();
        return $AlleAbgabe-Abgabe::AlleAnzahlNichtAbgeben($uebungsblaetterID);
    }
    
    /*
     * Aftersave, alle Abgabe automatisch erstellen
     */
    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        if ($insert) {
            for ($i = 1; $i <= $this->uebungsblaetter->Anzahl_der_Aufgabe; $i++) {
                $model = new Einzelaufgabe;
                $model->AbgabeID = $this->AbgabeID;
                $model->AufgabeNr = $i;
                $model->save();
            }
        }
    }
    
    /*
     * Alle Abgabe zuruckgeben, von bestimmten Gruppe
     */
    public static function AlleAbgabeVonGrup($gruppeID) {
        return Abgabe::find()->where(['UebungsgruppenID'=>$gruppeID])->all();
    }
    
    /*
     *  alle punkte zahl von Übung in form anzahl=>punkt zuruck
     */
    public static function AllePunktVonUebung($uebungsID){
        $modelUebung = Uebung::findOne($uebungsID);
        $arrayNote = array();
        foreach ($modelUebung->uebungsgruppes as $gruppe){
            foreach ($gruppe->abgabes as $abgabe){
                array_push($arrayNote, (int)($abgabe->GesamtePunkt*100));
            }
        }
        sort($arrayNote);        
        return array_count_values($arrayNote);
    }
    
    /*
     *  Anzahl der person zuruck
     */
    public static function PunktzahlUebung($uebungsID) {
        $arrayPerson = array();
        foreach (Abgabe::AllePunktVonUebung($uebungsID) as $key=>$item){
            array_push($arrayPerson, ((double)$key)/100);
        }
        return $arrayPerson;
    }
    
    /*
     *  Punktezhal zuruck
     */
    public static function AnzahlPersonUebung($uebungsID){
        $arrayPunkt = array();
        foreach (Abgabe::AllePunktVonUebung($uebungsID) as $item){
            array_push($arrayPunkt, $item);
        }
        return $arrayPunkt;
    }
}
