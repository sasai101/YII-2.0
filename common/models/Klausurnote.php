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
            [['Punkt'],'number'],
            [['Note'], 'number'],
            [['Benutzer_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['Benutzer_MarterikelNr' => 'marterikelnr']],
            [['Mitarbeiter_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Mitarbeiter::className(), 'targetAttribute' => ['Mitarbeiter_MarterikelNr' => 'marterikelnr']],
            [['KlausurID'], 'exist', 'skipOnError' => true, 'targetClass' => Klausur::className(), 'targetAttribute' => ['KlausurID' => 'klausurid']],
            
            //
            [['Punkt'], 'NotenGrenzen'],
        ];
    }
    
    /*
     *  Validieren, um PUnktzahl zu uberprufen
     */
    public function NotenGrenzen($attribute, $params)
    {
        $modelKlausur = Klausur::findOne($this->KlausurID);
        
        if( $this->Punkt > $modelKlausur->Max_Punkte){
            $this->addError($attribute,'Der eingegebene Punkt muss kleiner als maxmale Punkte sein');
        }else if( $this->Punkt < 0){
            $this->addError($attribute,'Der eingegebene Punkt muss immer ein positive Zahl sein.');
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
            if($this->Punkt == null){
                $this->Note = null;
            }else{
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
                }else if($this->Punkt < $model->punkt4_0 && $this->Punkt >= 0){
                    $this->Note = 5.0;
                }
            }
            return true;
        }
        else
        {
            return false;
        }
    } 
    
    /*
     * Anzahl der Person bei bestimmt Note (klausurnote/echartspieklausurnote)
     */
    public static function KlausurnotePerson1_0($KlausurID) {
        $modelKlausur = Klausur::findOne($KlausurID);
        return  Klausurnote::find()->where(['and',"Punkt>=$modelKlausur->punkt1_0","Punkt<=$modelKlausur->Max_Punkte"])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
        //return  Klausurnote::find()->where(['between','Punkt',$modelKlausur->punkt1_0,$modelKlausur->Max_Punkte])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
    }
    public static function KlausurnotePerson1_3($KlausurID) {
        $modelKlausur = Klausur::findOne($KlausurID);
        return  Klausurnote::find()->where(['and',"Punkt>=$modelKlausur->punkt1_3","Punkt<$modelKlausur->punkt1_0"])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
        //return  Klausurnote::find()->where(['between','Punkt',$modelKlausur->punkt1_3,$modelKlausur->punkt1_0])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
    }
    public static function KlausurnotePerson1_7($KlausurID) {
        $modelKlausur = Klausur::findOne($KlausurID);
        return  Klausurnote::find()->where(['and',"Punkt>=$modelKlausur->punkt1_7","Punkt<$modelKlausur->punkt1_3"])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
        //return  Klausurnote::find()->where(['between','Punkt',$modelKlausur->punkt1_7,$modelKlausur->punkt1_3])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
    }
    public static function KlausurnotePerson2_0($KlausurID) {
        $modelKlausur = Klausur::findOne($KlausurID);
        return  Klausurnote::find()->where(['and',"Punkt>=$modelKlausur->punkt2_0","Punkt<$modelKlausur->punkt1_7"])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
        //return  Klausurnote::find()->where(['between','Punkt',$modelKlausur->punkt2_0,$modelKlausur->punkt1_7])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
    }
    public static function KlausurnotePerson2_3($KlausurID) {
        $modelKlausur = Klausur::findOne($KlausurID);
        return  Klausurnote::find()->where(['and',"Punkt>=$modelKlausur->punkt2_3","Punkt<$modelKlausur->punkt2_0"])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
        //return  Klausurnote::find()->where(['between','Punkt',$modelKlausur->punkt2_3,$modelKlausur->punkt2_0])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
    }
    public static function KlausurnotePerson2_7($KlausurID) {
        $modelKlausur = Klausur::findOne($KlausurID);
        return  Klausurnote::find()->where(['and',"Punkt>=$modelKlausur->punkt2_7","Punkt<$modelKlausur->punkt2_3"])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
        //return  Klausurnote::find()->where(['between','Punkt',$modelKlausur->punkt2_7,$modelKlausur->punkt2_3])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
    }
    public static function KlausurnotePerson3_0($KlausurID) {
        $modelKlausur = Klausur::findOne($KlausurID);
        return  Klausurnote::find()->where(['and',"Punkt>=$modelKlausur->punkt3_0","Punkt<$modelKlausur->punkt2_7"])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
        //return  Klausurnote::find()->where(['between','Punkt',$modelKlausur->punkt3_0,$modelKlausur->punkt2_7])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
    }
    public static function KlausurnotePerson3_3($KlausurID) {
        $modelKlausur = Klausur::findOne($KlausurID);
        return  Klausurnote::find()->where(['and',"Punkt>=$modelKlausur->punkt3_3","Punkt<$modelKlausur->punkt3_0"])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
        //return  Klausurnote::find()->where(['between','Punkt',$modelKlausur->punkt3_3,$modelKlausur->punkt3_0])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
    }
    public static function KlausurnotePerson3_7($KlausurID) {
        $modelKlausur = Klausur::findOne($KlausurID);
        return  Klausurnote::find()->where(['and',"Punkt>=$modelKlausur->punkt3_7","Punkt<$modelKlausur->punkt3_3"])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
        //return  Klausurnote::find()->where(['between','Punkt',$modelKlausur->punkt3_7,$modelKlausur->punkt3_3])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
    }
    public static function KlausurnotePerson4_0($KlausurID) {
        $modelKlausur = Klausur::findOne($KlausurID);
        return  Klausurnote::find()->where(['and',"Punkt>=$modelKlausur->punkt4_0","Punkt<$modelKlausur->punkt3_7"])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
        //return  Klausurnote::find()->where(['between','Punkt',$modelKlausur->punkt4_0,$modelKlausur->punkt3_7])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
    }
    public static function KlausurnotePerson5_0($KlausurID) {
        $modelKlausur = Klausur::findOne($KlausurID);
        return  Klausurnote::find()->where(['and',"Punkt>=0","Punkt<$modelKlausur->punkt4_0"])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
        //return  Klausurnote::find()->where(['<','Punkt',$modelKlausur->punkt4_0])->andWhere(['KlausurID'=>$modelKlausur->KlausurID])->count();
    }
    
    /*
     * Durchschnitt Klausur (benutzer/view---klausurnotelisrview)
     */
    public static function Klausurdurchschnitt($klausurID) {
        $gesamte = 0;
        $modelAlenote = Klausurnote::find()->where(['KlausurID'=>$klausurID])->all();
        $i = 0;
        foreach ($modelAlenote as $note){
            $gesamte += $note->Note;
            $i++;
        }
        if($i==0){
            return 0;
        }else{
            return $gesamte/$i;
        }
    }
    
    /*
     * GEstamte Teilnahmer von Klausur (benutzer/view---klausurnotelisrview)
     */
    public static function gesatmtePerson($klausurID){
        return Klausurnote::find()->where(['KlausurID'=>$klausurID])->count();
    }
    
    /*
     * Anzahl wer bestanden ist,  (mitarbeiter/view ->_klausurlistview)
     */
    public static function AnzahlderBestander($klausurID) {
        return Klausurnote::gesatmtePerson($klausurID)-Klausurnote::KlausurnotePerson5_0($klausurID);
    }
    
    /*
     * Anzahl wer nicht bestanden ist, (mitarbeiter/view ->_klausurlistview)
     */
    public static function AnzahlderNichtBestander($klausurID) {
        return Klausurnote::gesatmtePerson($klausurID)-Klausurnote::AnzahlderBestander($klausurID);
    }
    
    /*
     *  Alle Note als Array zuruck, Klausur/echarsbarklausur
     */
    public static function NoteInArray() {
        return array('1.0', '1.3', '1.7', '2.0', '2.3', '2.7', '3.0', '3.3', '3.7', '4.0', '5.0');
    }
    
    /*
     *  Anzahl der Person für jeweiligen Note, Klausur/echarsbarklausur
     */
    public static function AnzahlDerPersonMitNotInArray($KlausurID) {
        return array(Klausurnote::KlausurnotePerson1_0($KlausurID), Klausurnote::KlausurnotePerson1_3($KlausurID),Klausurnote::KlausurnotePerson1_7($KlausurID), Klausurnote::KlausurnotePerson2_0($KlausurID),Klausurnote::KlausurnotePerson2_3($KlausurID), Klausurnote::KlausurnotePerson2_7($KlausurID),Klausurnote::KlausurnotePerson3_0($KlausurID),Klausurnote::KlausurnotePerson3_3($KlausurID),Klausurnote::KlausurnotePerson3_7($KlausurID),Klausurnote::KlausurnotePerson4_0($KlausurID),Klausurnote::KlausurnotePerson5_0($KlausurID));
    }
    
    //Klausurnote löschen , mit MarterikelNr
    public static function DeleteKlausurnotMitMar($marterikelNr){
        $modelKlausurnote = Klausurnote::find()->where(['Benutzer_MarterikelNr'=>$marterikelNr])->all();
        foreach ($modelKlausurnote as $note){
            $note->delete();
        }
    }
    
    //Klausurnote löschen , mit Mitarbeiter_MarterikelNr
    public static function DeleteKlausurnotMitMitarbeitMar($marterikelNr){
        $modelKlausurnote = Klausurnote::find()->where(['Mitarbeiter_MarterikelNr'=>$marterikelNr])->all();
        foreach ($modelKlausurnote as $note){
            $note->delete();
        }
    }
    
    //Klausurnote löschen , mit KlausurID
    public static function DeleteKlausurnotMitKlausurID($klausurID){
        $modelKlausurnote = Klausurnote::find()->where(['KlausurID'=>$klausurID])->all();
        foreach ($modelKlausurnote as $note){
            $note->delete();
        }
    }
    
    /*
     * alle Klausur punkte in array_value_count (klausur/echartsbarkalsur)mit Klausur ID
     */
    public static function KlausurnoteINArray($klausurID) {
        $modelPunkte = Klausurnote::find()->where(['KlausurID'=>$klausurID])->all();
        $arrayPunkte = array();
        foreach ($modelPunkte as $klausurnote){
            array_push($arrayPunkte, (int)$klausurnote->Punkt*100);
        }
        return array_count_values($arrayPunkte);
    }
    
    /*
     * Anzahl der Pseron mit bestimmten Punkte in array Zuruck.(klausur/echartsbarkalsur)mit Klausur ID
     */
    public static function KlausurnoteAnzahlInarray($klausurID) {
        $arrayAnzahl = array();
        $array = Klausurnote::KlausurnoteINArray($klausurID);
        foreach ($array as $item){
            array_push($arrayAnzahl, $item);
        }
        return $arrayAnzahl;
    }
    
    /*
     * Alle Punktezahl in array Zuruck.(klausur/echartsbarkalsur)mit Klausur ID
     */
    public static function KlausurnotePunktzahlInarray($klausurID) {
        $arrayAnzahl = array();
        $array = Klausurnote::KlausurnoteINArray($klausurID);
        foreach ($array as $key=>$item){
            array_push($arrayAnzahl, (double)$key/100);
        }
        return $arrayAnzahl;
    }
    
    /*
     * Anzahl der unkorrigierte Note von Klausur , der von bestimmten Mitarbeiter erstellt wird (leyout/header)
     */
    public static function AnzahlKlausuren($mitarbeiterMarterikelNr){
        $alleKlausur = Klausur::find()->where(['Mitarbeiter_MarterikelNr'=>$mitarbeiterMarterikelNr])->all();
        $anzahl = 0;
        foreach ($alleKlausur as $klausur){
            if (\common\models\Klausurnote::find()->where(['KlausurID'=>$klausur->KlausurID,'Punkt'=>null])->count()!=0){
                $anzahl += \common\models\Klausurnote::find()->where(['KlausurID'=>$klausur->KlausurID,'Punkt'=>null])->count();
            }
        }
        return $anzahl;
    }
    
    /*
     *  Alle an Klausur angemeldete Person , Automatisch in der Klausurnote eintragen
     */
    public static function KlausurnoteAutomEintragen($klausurID) {
        $model = Klausur::findOne($klausurID);
        $arrayPerson = BenutzerAnmeldenKlausur::AllePersonKlausun($klausurID);
        
        $jetze = date('d.m.Y H:i:s',time()+60*60);
        $prufdatum = date($model->Pruefungsdatum);
        if(strtotime($prufdatum) < strtotime($jetze)){
            foreach ($arrayPerson as $person){
                if(\common\models\Klausurnote::find()->where(['KlausurID'=>$klausurID, 'Benutzer_MarterikelNr'=>$person])->all() == null){
                    $modelKlausurnote = new Klausurnote;
                    $modelKlausurnote->Mitarbeiter_MarterikelNr = $model->Mitarbeiter_MarterikelNr;
                    $modelKlausurnote->Benutzer_MarterikelNr = $person;
                    $modelKlausurnote->KlausurID = $klausurID;
                    $modelKlausurnote->save();
                }
            }
        }
    }
    
    /*
     * Finde alle Person, wer Klausur nicht bestatnd hat
     */
    public static function KlausurnoteNichtBestand($klausurID) {
        $model = Klausurnote::find()->where(['KlausurID'=>$klausurID])->all();
        $arrayPerson = array();
        $noteFlag = true;
        // überprüfen ob alle Note eingeragen werden oder nicht
        foreach ($model as $person){
            if($person->Note == null){
                $noteFlag = false;
            }
        }
        if($noteFlag == true){
            foreach ($model as $person){
                if($person->Note > 4.0){
                    array_push($arrayPerson, $person->Benutzer_MarterikelNr);
                }
            }
            return $arrayPerson;
        }else{
            $arrayPerson = array();
            return $arrayPerson;
        }
    }
}
