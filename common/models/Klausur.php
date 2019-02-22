<?php

namespace common\models;

use Yii;
use phpDocumentor\Reflection\Types\Null_;

/**
 * This is the model class for table "klausur".
 *
 * @property int $KlausurID
 * @property int $Mitarbeiter_MarterikelNr
 * @property int $ModulID
 * @property int $Kreditpunkt
 * @property string $Pruefungsdatum
 * @property string $Bezeichnung
 * @property int $Max_Punkte
 * @property int $punkt1_0
 * @property int $punkt1_3
 * @property int $punkt1_7
 * @property int $punkt2_0
 * @property int $punkt2_3 
 * @property int $punkt2_7 
 * @property int $punkt3_0
 * @property int $punkt3_3
 * @property int $punkt3_7
 * @property int $punkt4_0
 *
 * @property BenutzerAnmeldenKlausur[] $benutzerAnmeldenKlausurs
 * @property Benutzer[] $benutzerMarterikelNrs
 * @property Mitarbeiter $mitarbeiterMarterikelNr
 * @property Modul $modul
 * @property Klausurnote[] $klausurnotes 
 */
class Klausur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'klausur';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Mitarbeiter_MarterikelNr', 'ModulID', 'Kreditpunkt', 'Pruefungsdatum', 'Bezeichnung', 'Max_Punkte', 'punkt1_0', 'punkt1_3', 'punkt1_7', 'punkt2_0', 'punkt2_3', 'punkt2_7', 'punkt3_0', 'punkt3_3', 'punkt3_7', 'punkt4_0'], 'required'],
            [['Mitarbeiter_MarterikelNr', 'ModulID', 'Kreditpunkt', 'Max_Punkte', 'punkt1_0', 'punkt1_3', 'punkt1_7', 'punkt2_0', 'punkt2_3', 'punkt2_7', 'punkt3_0', 'punkt3_3', 'punkt3_7', 'punkt4_0'], 'integer'],
            [['Pruefungsdatum', 'Bezeichnung'], 'string', 'max' => 255],
            [['Mitarbeiter_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Mitarbeiter::className(), 'targetAttribute' => ['Mitarbeiter_MarterikelNr' => 'marterikelnr']],
            [['ModulID'], 'exist', 'skipOnError' => true, 'targetClass' => Modul::className(), 'targetAttribute' => ['ModulID' => 'ModulID']],
//             ['Pruefungsdatum', 'checkDatum'],
            ['Max_Punkte', 'checkMax'],
            ['punkt1_0', 'checkPunkt1_0'],
            ['punkt1_3', 'checkPunkt1_3'],
            ['punkt1_7', 'checkPunkt1_7'],
            ['punkt2_0', 'checkPunkt2_0'],
            ['punkt2_3', 'checkPunkt2_3'],
            ['punkt2_7', 'checkPunkt2_7'],
            ['punkt3_0', 'checkPunkt3_0'],
            ['punkt3_3', 'checkPunkt3_3'],
            ['punkt3_7', 'checkPunkt3_7'],
            ['punkt4_0', 'checkPunkt4_0'],
            //['Bezeichnung', 'checkBezeichnung']
        ];
    }
    
    /*public function checkBezeichnung($attribute, $params) {
        $modelKlausur = Klausur::find()->where(['ModulID'=>$this->ModulID, 'Bezeichnung'=>$this->Bezeichnung])->all();
        if($modelKlausur !=null){
            $this->addError($attribute, 'Diese Klausur ist schon existiert, bitte geben die Bezeichnung erneut');
        }
    }*/
    /*public function checkDatum($attribute, $params) {
        $heute = date('d-m-Y H:i:s');
        $prufdatum = date($this->Pruefungsdatum);
        if( $prufdatum < $heute){
            $this->addError($attribute,'Das Prüfungsdatum muss grösser als heute sein.');
        }
    }*/
    public function checkMax($attribute, $params) {
        if( $this->Max_Punkte < 0){
            $this->addError($attribute,'Max Punkt muss immer ein positive Zahl sein.');
        }else if($this->Max_Punkte>5000){
            $this->addError($attribute,'Max Punkt muss immer kleiner als 5000 sein.');
        }
    }
    public function checkPunkt1_0($attribute, $params) {
        if( $this->Max_Punkte == null){
            $this->addError($attribute,'Bitte füllen Sie erst die Maximale Punkt aus.');
        }else {
            if( $this->punkt1_0 < 0){
                $this->addError($attribute,'Punkt 1.0 muss immer ein positive Zahl sein.');
            }else if($this->punkt1_0 <= $this->punkt1_3){
                $this->addError($attribute,'Punkt 1.0 muss immer größer als Punkt 1.3 sein.');
            }else if($this->punkt1_0 >= $this->Max_Punkte){
                $this->addError($attribute,'Punkt 1.0 muss kleine als Max Punkt sein.');
            }
        }
    }
    public function checkPunkt1_3($attribute, $params) {
        if( $this->punkt1_0 == null){
            $this->addError($attribute,'Bitte füllen Sie erst die Punkt 1.0 aus.');
        }else {
            if( $this->punkt1_3 < 0){
                $this->addError($attribute,'Punkt 1.3 muss immer ein positive Zahl sein.');
            }else if($this->punkt1_3 <= $this->punkt1_7){
                $this->addError($attribute,'Punkt 1.3 muss immer größer als Punkt 1.7 sein.');
            }else if($this->punkt1_3 >= $this->punkt1_0){
                $this->addError($attribute,'Punkt 1.3 muss kleine als Punkt 1.0 sein..');
            }
        }
    }
    public function checkPunkt1_7($attribute, $params) {
        if( $this->punkt1_3 == null){
            $this->addError($attribute,'Bitte füllen Sie erst die Punkt 1.3 aus.');
        }else {
            if( $this->punkt1_7 < 0){
                $this->addError($attribute,'Punkt 1.7 muss immer ein positive Zahl sein.');
            }else if($this->punkt1_7 <= $this->punkt2_0){
                $this->addError($attribute,'Punkt 1.7 muss immer größer als Punkt 2.0 sein.');
            }else if($this->punkt1_7 >= $this->punkt1_3){
                $this->addError($attribute,'Punkt 1.7 muss kleine als Punkt 1.3 sein..');
            }
        }
    }
    public function checkPunkt2_0($attribute, $params) {
        if( $this->punkt1_7 == null){
            $this->addError($attribute,'Bitte füllen Sie erst die Punkt 1.7 aus.');
        }else {
            if( $this->punkt2_0 < 0){
                $this->addError($attribute,'Punkt 2.0 muss immer ein positive Zahl sein.');
            }else if($this->punkt2_0 <= $this->punkt2_3){
                $this->addError($attribute,'Punkt 2.0 muss immer größer als Punkt 2.3 sein.');
            }else if($this->punkt2_0 >= $this->punkt1_7){
                $this->addError($attribute,'Punkt 2.0 muss kleine als Punkt 1.7 sein..');
            }
        }
    }
    public function checkPunkt2_3($attribute, $params) {
        if( $this->punkt2_0 == null){
            $this->addError($attribute,'Bitte füllen Sie erst die Punkt 2.0 aus.');
        }else {
            if( $this->punkt2_3 < 0){
                $this->addError($attribute,'Punkt 2.3 muss immer ein positive Zahl sein.');
            }else if($this->punkt2_3 <= $this->punkt2_7){
                $this->addError($attribute,'Punkt 2.3 muss immer größer als Punkt 2.7 sein..');
            }else if($this->punkt2_3 >= $this->punkt2_0){
                $this->addError($attribute,'Punkt 2.3 muss kleine als Punkt 2.0 sein..');
            }
        }
    }
    public function checkPunkt2_7($attribute, $params) {
        if( $this->punkt2_3 == null){
            $this->addError($attribute,'Bitte füllen Sie erst die Punkt 2.3 aus.');
        }else {
            if( $this->punkt2_7 < 0){
                $this->addError($attribute,'Punkt 2.7 muss immer ein positive Zahl sein.');
            }else if($this->punkt2_7 <= $this->punkt3_0){
                $this->addError($attribute,'Punkt 2.7 muss immer größer als Punkt 3.0 sein.');
            }else if($this->punkt2_7 >= $this->punkt2_3){
                $this->addError($attribute,'Punkt 2.7 muss kleine als Punkt 2.3 sein.');
            }
        }
    }
    public function checkPunkt3_0($attribute, $params) {
        if( $this->punkt2_7 == null){
            $this->addError($attribute,'Bitte füllen Sie erst die Punkt 2.7 aus.');
        }else {
            if( $this->punkt3_0 < 0){
                $this->addError($attribute,'Punkt 3.0 muss immer ein positive Zahl sein.');
            }else if($this->punkt3_0 <= $this->punkt3_3){
                $this->addError($attribute,'Punkt 3.0 muss immer größer als Punkt 3.3 sein.');
            }else if($this->punkt3_0 >= $this->punkt2_7){
                $this->addError($attribute,'Punkt 3.0 muss kleine als Punkt 2.7 sein.');
            }
        }
    }
    public function checkPunkt3_3($attribute, $params) {
        if( $this->punkt3_0 == null){
            $this->addError($attribute,'Bitte füllen Sie erst die Punkt 3.0 aus.');
        }else {
            if( $this->punkt3_3 < 0){
                $this->addError($attribute,'Punkt 3.3 muss immer ein positive Zahl sein.');
            }else if($this->punkt3_3 <= $this->punkt3_7){
                $this->addError($attribute,'Punkt 3.3 muss immer größer als Punkt 3.7 sein.');
            }else if($this->punkt3_3 >= $this->punkt3_0){
                $this->addError($attribute,'Punkt 3.3 muss kleine als Punkt 3.0 sein.');
            }
        }
    }
    public function checkPunkt3_7($attribute, $params) {
        if( $this->punkt3_3 == null){
            $this->addError($attribute,'Bitte füllen Sie erst die Punkt 3.3 aus.');
        }else {
            if( $this->punkt3_7 < 0){
                $this->addError($attribute,'Punkt 3.7 muss immer ein positive Zahl sein.');
            }else if($this->punkt3_7 <= $this->punkt4_0){
                $this->addError($attribute,'Punkt 3.7 muss immer größer als Punkt 4.0 sein.');
            }else if($this->punkt3_7 >= $this->punkt3_3){
                $this->addError($attribute,'Punkt 3.7 muss kleine als Punkt 3.3 sein.');
            }
        }
    }
    public function checkPunkt4_0($attribute, $params) {
        if( $this->punkt3_7 == null){
            $this->addError($attribute,'Bitte füllen Sie erst die Punkt 3.3 aus.');
        }else {
            if( $this->punkt4_0 <= 0){
                $this->addError($attribute,'Punkt 4.0 muss immer ein positive Zahl sein.');
            }else if($this->punkt4_0 >= $this->punkt3_7){
                $this->addError($attribute,'Punkt 4.0 muss immer kleiner als Punkt 4.0 sein.');
            }
        }
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KlausurID' => 'Klausur ID',
            'Mitarbeiter_MarterikelNr' => 'Mitarbeiter',
            'ModulID' => 'Modul',
            'Kreditpunkt' => 'Kreditpunkt',
            'Pruefungsdatum' => 'Prüfungsdatum',
            'Bezeichnung' => 'Bezeichnung',
            'Max_Punkte' => 'Max  Punkte',
            'punkt1_0' => 'Punkt 1.0',
            'punkt1_3' => 'Punkt 1.3',
            'punkt1_7' => 'Punkt 1.7',
            'punkt2_0' => 'Punkt 2.0',
            'punkt2_3' => 'Punkt 2.3',
            'punkt2_7' => 'Punkt 2.7',
            'punkt3_0' => 'Punkt 3.0',
            'punkt3_3' => 'Punkt 3.3',
            'punkt3_7' => 'Punkt 3.7',
            'punkt4_0' => 'Punkt 4.0',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzerAnmeldenKlausurs()
    {
        return $this->hasMany(BenutzerAnmeldenKlausur::className(), ['KlausurID' => 'KlausurID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzerMarterikelNrs()
    {
        return $this->hasMany(Benutzer::className(), ['marterikelnr' => 'Benutzer_MarterikelNr'])->viaTable('benutzer_anmelden_klausur', ['KlausurID' => 'KlausurID']);
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
    public function getKlausurnotes()
    {
        return $this->hasMany(Klausurnote::className(), ['KlausurID' => 'KlausurID']);
    }
    
    /*
     *  Gibt die Mitarbeitername für Klausurerstellung zurück
     */
    public function getMitarbeitername($param) {
        $model = Benutzer::findOne($param);
        $mitarbeitername = $model->Vorname.' '.$model->Nachname;
        return $mitarbeitername;
    }
    
    /*
     *  beforsave Methode,um die Note automatisch zu tragen
     */
    public function beforeSave($insert)
    {
        
        // die orignale Funktion erstmal durchfueren,
        if(parent::beforeSave($insert))
        {
            //um sich zu entscheiden ,ob es ein neue Kunde ist oder alte
            if($insert)
            {
                
            }
            else
            {
                $model = Klausurnote::find()->where(['KlausurID'=>$this->KlausurID])->all();
                foreach ($model as $klausurnote)
                {
                    if($klausurnote->Punkt >= $this->punkt1_0 && $klausurnote->Punkt <= $this->Max_Punkte){
                        $klausurnote->Note = 1.0;
                        $klausurnote->save();
                    }else if($klausurnote->Punkt >= $this->punkt1_3 && $klausurnote->Punkt <= $this->punkt1_0){
                        $klausurnote->Note = 1.3;
                        $klausurnote->save();
                    }else if($klausurnote->Punkt >= $this->punkt1_7 && $klausurnote->Punkt <= $this->punkt1_3){
                        $klausurnote->Note = 1.7;
                        $klausurnote->save();
                    }else if($klausurnote->Punkt >= $this->punkt2_0 && $klausurnote->Punkt <= $this->punkt1_7){
                        $klausurnote->Note = 2.0;
                        $klausurnote->save();
                    }else if($klausurnote->Punkt >= $this->punkt2_3 && $klausurnote->Punkt <= $this->punkt2_0){
                        $klausurnote->Note = 2.3;
                        $klausurnote->save();
                    }else if($klausurnote->Punkt >= $this->punkt2_7 && $klausurnote->Punkt <= $this->punkt2_3){
                        $klausurnote->Note = 2.7;
                        $klausurnote->save();
                    }else if($klausurnote->Punkt >= $this->punkt3_0 && $klausurnote->Punkt <= $this->punkt2_7){
                        $klausurnote->Note = 3.0;
                        $klausurnote->save();
                    }else if($klausurnote->Punkt >= $this->punkt3_3 && $klausurnote->Punkt <= $this->punkt3_0){
                        $klausurnote->Note = 3.3;
                        $klausurnote->save();
                    }else if($klausurnote->Punkt >= $this->punkt3_7 && $klausurnote->Punkt <= $this->punkt3_3){
                        $klausurnote->Note = 3.7;
                        $klausurnote->save();
                    }else if($klausurnote->Punkt >= $this->punkt4_0 && $klausurnote->Punkt <= $this->punkt3_7){
                        $klausurnote->Note = 4.0;
                        $klausurnote->save();
                    }else if($klausurnote->Punkt < $this->punkt4_0){
                        $klausurnote->Note = 5.0;
                        $klausurnote->save();
                    }
                }
            }
            return true;
        }
        else
        {
            return false;
        }
    } 
    
    //Klausurnote löschen , mit Mitarbeiter_MarterikelNr
    public static function DeleteKlausurMitMitarbeitMar($marterikelNr){
        $modelKlausur = Klausur::find()->where(['Mitarbeiter_MarterikelNr'=>$marterikelNr])->all();
        foreach ($modelKlausur as $klausur){
            //alle Anmeldung des Klausures löschen
            BenutzerAnmeldenKlausur::DeleteAnmeldKlausurKlausurID($klausur->KlausurID);
            Klausurnote::DeleteKlausurnotMitKlausurID($klausur->KlausurID);
            $klausur->delete();
        }
    }
    
    // AngemeldetePerson in Array
    public static function AngemeldetePerson($uebungsID){
        $person = array();
        $person = Uebung::ZugelassenenPersonUebung($uebungsID);
        return $person;
    }
    
    // ÜbungsblätterID in Array
    public static function UebungsblaetterIDArray($uebungsID){
        $uebungsblaetter = array();
        $uebung = Uebung::findOne($uebungsID);
        foreach ($uebung->uebungsblaetters as $uebungsblatt){
            array_push($uebungsblaetter, $uebungsblatt->UebungsblatterID);
        }
        return $uebungsblaetter;
    }
    
    // Uebungspunkte eines Studierendes In Array
    public static function UebungsPunkteInArray($klausurID){
        
        $Klausur = Klausur::findOne($klausurID);
        $uebungsID = 0;
        foreach ($Klausur->modul->uebungs as $uebung){
            $uebungsID = $uebung->UebungsID;
        }
        
        $persons = Klausur::AngemeldetePerson($uebungsID);
        $uebungsblaetter = Klausur::UebungsblaetterIDArray($uebungsID);
        
        
        $vorhersagePunkte = array();
        
        foreach ($persons as $person){
            $punkte = array();
            $UbungsNr = array();
            foreach ($uebungsblaetter as $key => $blatt){
                $uebungsblatt = Uebungsblaetter::findOne($blatt);
                $abgaben = Abgabe::find()->where(['Benutzer_MarterikelNr'=>$person, 'UebungsblaetterID'=>$blatt])->all();
                foreach ($abgaben as $abgabe ){
                    $punkt = ($abgabe->GesamtePunkt/$uebungsblatt->GesamtePunkte)*$Klausur->Max_Punkte;
                }
                if($abgabe->AbgabeZeit != null){
                    array_push($punkte, $punkt);
                    array_push($UbungsNr, $key+1);
                }
             }
//             echo "<br/>";
//             echo "Anzahl der Übung: ".count($punkte);
//             echo "<br/>";
//             echo $person;
//             echo "<br/>";
            if(count($punkte)<=3){
                array_push($vorhersagePunkte, 0);
                //echo "OK";
            }else {
                array_push($vorhersagePunkte, (int)Klausur::LienearRession($UbungsNr, $punkte)*100);
            }
//             echo "<br/>";
//             var_dump($punkte);
//             echo "<br/>";
//             Klausur::LienearRession($UbungsNr, $punkte);
//             echo "<br/>";
            //break;
        }
//          var_dump(array_count_values($vorhersagePunkte));
//          exit(0);
        sort($vorhersagePunkte);
        return array_count_values($vorhersagePunkte);
    }
    
    /*
     * Alle Punktezahl in array Zuruck.(klausur/echartsbarkalsur)mit Klausur ID
     */
    public static function AnzahlderPerson($klausurID) {
        $arrayAnzahl = array();
        $array = Klausur::UebungsPunkteInArray($klausurID);
        foreach ($array as $key=>$item){
            array_push($arrayAnzahl, $item);
        }
        return $arrayAnzahl;
    }
    
    /*
     * Alle Punktezahl in array Zuruck.(klausur/echartsbarkalsur)mit Klausur ID
     */
    public static function KlausurnotePunktzahlInarray($klausurID) {
        $arrayAnzahl = array();
        $array = Klausur::UebungsPunkteInArray($klausurID);
        foreach ($array as $key=>$item){
            array_push($arrayAnzahl, (double)$key/100);
        }
        return $arrayAnzahl;
    }
    
    // Linearte Regession
    public static function LienearRession($x, $y) {
        $n = count($x);
        $SumX = array_sum($x);
        $SumY = array_sum($y);
        
        $RR = 0;
        
        $SumXX = 0;
        $SumXY = 0;
        $SumYY = 0;
        $YDurch = $SumY/$n;
        
        for($i = 0; $i < $n; $i++){
            $SumXY += ($x[$i]*$y[$i]);
            $SumXX += ($x[$i]*$x[$i]);
            //$SumYY += ($y[$i]*$x[$i]);
        }
        
        $Beta1 = ($n * $SumXY - $SumX * $SumY) / ($n * $SumXX - $SumX * $SumX);
        $Beta0 = $SumY / $n - $Beta1 * $SumX / $n;
        
//         echo $Beta0." ".$Beta1;
//         echo "<br/>";
        
        $sumDeltaYY = 0;
        $sumTotYY = 0;
        
        for($i = 0; $i < $n; $i++){
            $yi = $y[$i];
            $Yhot = $Beta0 + $Beta1 * $x[$i];
            $deltaY = $yi -$Yhot;
            $deltaYY = $deltaY*$deltaY;
            $sumDeltaYY += $deltaYY;
            $totY = $y[$i] - $YDurch;
            $totYY = $totY * $totY;
            $sumTotYY += $totYY; 
        }
        if($sumTotYY != 0){
            
        }
//         echo "<br/>";
//         echo $YDurch;
//         echo "<br/>";
//         echo $yi;
//         echo "<br/>";
//         echo $yi;
//         echo "<br/>";
        if($sumTotYY == 0){
            return $SumY/$n;
        }else{
            $RR = 1 - ($sumDeltaYY / $sumTotYY);
            
//          echo "<br/>";
//          echo $RR;
            if($RR <= 1 && $RR > 0){
                return $Beta0 + $Beta1 * ($n+1);
            }else{
                return $SumY/$n;
            }
        }
    } 
    
    // Uebungspunkte eines Studierendes In Array
    public static function UebungsPunkteInArrayMitMarterikelNR($klausurID){
        
        $Klausur = Klausur::findOne($klausurID);
        $uebungsID = 0;
        foreach ($Klausur->modul->uebungs as $uebung){
            $uebungsID = $uebung->UebungsID;
        }
        
        $persons = Klausur::AngemeldetePerson($uebungsID);
        $uebungsblaetter = Klausur::UebungsblaetterIDArray($uebungsID);
        
        
        $vorhersagePunkte = array();
        
        foreach ($persons as $person){
            $punkte = array();
            $UbungsNr = array();
            foreach ($uebungsblaetter as $key => $blatt){
                $uebungsblatt = Uebungsblaetter::findOne($blatt);
                $abgaben = Abgabe::find()->where(['Benutzer_MarterikelNr'=>$person, 'UebungsblaetterID'=>$blatt])->all();
                foreach ($abgaben as $abgabe ){
                    $punkt = ($abgabe->GesamtePunkt/$uebungsblatt->GesamtePunkte)*$Klausur->Max_Punkte;
                }
                if($abgabe->AbgabeZeit != null){
                    array_push($punkte, $punkt);
                    array_push($UbungsNr, $key+1);
                }
            }           echo "<br/>";
            if(count($punkte)<=3){
                array_push($vorhersagePunkte, -1);
            }else {
                array_push($vorhersagePunkte, Klausur::LienearRession($UbungsNr, $punkte));
            }
        }
        $n = 0;
        foreach($vorhersagePunkte as $key => $val){
            
            $vorhersagePunkte[$persons[$n]] = $val;
            unset($vorhersagePunkte[$key]);
            $n++;
            
        }
        return $vorhersagePunkte;
    }
}
