<?php

namespace common\models;

use Yii;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "benutzer_anmelden_klausur".
 *
 * @property int $Benutzer_MarterikelNr
 * @property int $KlausurID
 * @property int $Anmeldungszeit
 * @property string $Anmeldungsstatus
 *
 * @property Benutzer $benutzerMarterikelNr
 * @property Klausur $klausur
 */
class BenutzerAnmeldenKlausur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'benutzer_anmelden_klausur';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Benutzer_MarterikelNr', 'KlausurID'], 'required'],
            [['Benutzer_MarterikelNr', 'KlausurID', 'Anmeldungszeit'], 'integer'],
            [['Benutzer_MarterikelNr', 'KlausurID'], 'unique', 'targetAttribute' => ['Benutzer_MarterikelNr', 'KlausurID']],
            [['Benutzer_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['Benutzer_MarterikelNr' => 'marterikelnr']],
            [['KlausurID'], 'exist', 'skipOnError' => true, 'targetClass' => Klausur::className(), 'targetAttribute' => ['KlausurID' => 'KlausurID']],
            ['Benutzer_MarterikelNr', 'MarterikelNrCheck'],
        ];
    }

    
    public function MarterikelNrCheck($attribute, $params) {
        $benutzer = Benutzer::findOne($this->Benutzer_MarterikelNr);
        if( $benutzer == null){
            $this->addError($attribute,'Der von Ihnen eingegebene Benutzer MarterikelNr ist nicht existiert.');
        }
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Benutzer_MarterikelNr' => 'Benutzer',
            'KlausurID' => 'Klausur',
            'Anmeldungszeit' => 'Anmeldungszeit',
            //'Anmeldungsstatus' => 'Anmeldungsstatus',
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
    public function getKlausur()
    {
        return $this->hasOne(Klausur::className(), ['KlausurID' => 'KlausurID']);
    }
    
    /*
     * Klausuranmeldung, werden die Benutuer,die jenigen die schon Klausurzulassung hat, automotisch eintragen, fur die alle Nachklausur automatisch anmelden
     */
    public static function Klausuranmeldung($id){
        
        $modelKlausur = Klausur::findOne($id);
        //alle Übungen
        $jetzt = date('d.m.Y H:i:s',time()+60*60);
        $klausurdatum = date($modelKlausur->Pruefungsdatum);
        if(strtotime($klausurdatum) > strtotime($jetzt)){
            //Anmeldung für Hauptklausur
            if($modelKlausur->Bezeichnung == "Hauptklausur"){
                foreach ($modelKlausur->modul->uebungs as $uebung){
                    
                    $allePersonUebung = Uebung::AllerPersonUebung($uebung->UebungsID);
                    
                    foreach ($allePersonUebung as $person){
                        $alleZugelassenePerson = Uebung::ZugelassenenPersonUebung($uebung->UebungsID);
                        if (in_array($person, $alleZugelassenePerson)) {
                            $model = new BenutzerAnmeldenKlausur;
                            $model->Benutzer_MarterikelNr=$person;
                            $model->KlausurID = $id;
                            $model->Anmeldungszeit = time();
                            $model->save();
                        }else{
                            $model = BenutzerAnmeldenKlausur::findOne($person,$id);
                            if ($model != null) {
                                $model->delete();
                            }
                        }
                    }
                }
            // 1.Nachklausur anmeldung
            }else if($modelKlausur->Bezeichnung == "1.Nachklausur"){
                //exit(0);
                //finde Hauptklausur
                $hauptKlausur = Klausur::find()->where(['ModulID'=>$modelKlausur->ModulID, 'Bezeichnung'=>'Hauptklausur'])->all();
                foreach ($hauptKlausur as $klausur){
                    //Alle nicht bestandene Personen von Klausur KlausurID
                    $arrayPerson = Klausurnote::KlausurnoteNichtBestand($klausur->KlausurID);
//                     print_r($arrayPerson);
//                     exit(0);
                    foreach ($arrayPerson as $person){
                        if (BenutzerAnmeldenKlausur::findOne($person, $klausur->KlausurID) != null) {
                            $model = new BenutzerAnmeldenKlausur;
                            $model->Benutzer_MarterikelNr=$person;
                            $model->KlausurID = $id;
                            $model->Anmeldungszeit = time();
                            $model->save();
                        }
                    }                    
                }
            //2.Nachklausur 
            }else if($modelKlausur->Bezeichnung == "2.Nachklausur"){
                //exit(0);
                //finde Hauptklausur
                $erstNachKlausur = Klausur::find()->where(['ModulID'=>$modelKlausur->ModulID, 'Bezeichnung'=>'1.Nachklausur'])->all();
                foreach ($erstNachKlausur as $klausur){
                    //Alle nicht bestandene Personen von Klausur KlausurID
                    $arrayPerson = Klausurnote::KlausurnoteNichtBestand($klausur->KlausurID);
                    //                     print_r($arrayPerson);
                    //                     exit(0);
                    foreach ($arrayPerson as $person){
                        if (BenutzerAnmeldenKlausur::findOne($person, $klausur->KlausurID) != null) {
                            $model = new BenutzerAnmeldenKlausur;
                            $model->Benutzer_MarterikelNr=$person;
                            $model->KlausurID = $id;
                            $model->Anmeldungszeit = time();
                            $model->save();
                        }
                    }
                }
            // 3.Nachklausur
            }else if($modelKlausur->Bezeichnung == "3.Nachklausur"){
                //exit(0);
                //finde Hauptklausur
                $zweitNachKlausur = Klausur::find()->where(['ModulID'=>$modelKlausur->ModulID, 'Bezeichnung'=>'2.Nachklausur'])->all();
                foreach ($zweitNachKlausur as $klausur){
                    //Alle nicht bestandene Personen von Klausur KlausurID
                    $arrayPerson = Klausurnote::KlausurnoteNichtBestand($klausur->KlausurID);
                    //                     print_r($arrayPerson);
                    //                     exit(0);
                    foreach ($arrayPerson as $person){
                        if (BenutzerAnmeldenKlausur::findOne($person, $klausur->KlausurID) != null) {
                            $model = new BenutzerAnmeldenKlausur;
                            $model->Benutzer_MarterikelNr=$person;
                            $model->KlausurID = $id;
                            $model->Anmeldungszeit = time();
                            $model->save();
                        }
                    }
                }
            }
        }
    }  
    
    // Benutzer anmelden klausur löschen ,mit MarterikelNr
    public static function DeleteAnmeldKlausur($marterikelNr){
        $modelAnmeldKlausur = BenutzerAnmeldenKlausur::find()->where(['Benutzer_MarterikelNr'=>$marterikelNr])->all();
        foreach ($modelAnmeldKlausur as $anmelden){
            $anmelden->delete();
        }
    }
    
    // alle Klausuranmeldung löschen , die von gelöschte Mitarbeiter erstellt
    public static function DeleteAnmeldKlausurKlausurID($klausurID){
        $modelAnmeldKlausur = BenutzerAnmeldenKlausur::find()->where(['KlausurID'=>$klausurID])->all();
        foreach ($modelAnmeldKlausur as $anmelden){
            $anmelden->delete();
        }
    }
    
    /*
     * Alle angemeldete Person in Array zuruck
     */
    public static function AllePersonKlausun($klausurID){
        $model = BenutzerAnmeldenKlausur::find()->where(['KlausurID'=>$klausurID])->all();
        $arrayPerson = array();
        foreach ($model as $person){
            array_push($arrayPerson, $person->Benutzer_MarterikelNr);
        }
        return $arrayPerson;
    }
}
