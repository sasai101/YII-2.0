<?php

namespace common\models;

use Yii;

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
        ];
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
     * Klausuranmeldung, werden die Benutuer,die jenigen die schon Klausurzulassung hat, automotisch eintragen 
     */
    public static function Klausuranmeldung($id){
        
        $modelKlausur = Klausur::findOne($id);
        //alle Übungen
        foreach ($modelKlausur->modul->uebungs as $uebung){
            
            //alle entsprechenden Übungsgruppe der jeweiligen Übung
            $modelUebungsgruppe = Uebungsgruppe::find()->where(['UebungsID'=>$uebung->UebungsID])->all();
            //Zulassungsgrenze
            $zulassung = $uebung->Zulassungsgrenze/100;
            $vollePunkt = 0;
            
            foreach ($uebung->uebungsblaetters as $punkte){
                $vollePunkt += $punkte->GesamtePunkte;
            }
            
            
            foreach ($modelUebungsgruppe as $gruppe){
                
                //Uebungsgruppe ID
                $uebungsgruppeID = $gruppe->UebungsgruppeID;
                
                foreach ($gruppe->benuterMarterikelNrs as $benutzer){
                    
                    // alle abgabe von einzel Benutzer von bestimmten Uebungsgruppe
                    $modelAbgabe = Abgabe::find()->where(['Benutzer_MarterikelNr'=>$benutzer, 'UebungsgruppenID'=>$uebungsgruppeID])->all();
                    $gesamtePunkte = 0;
                    foreach ($modelAbgabe as $einzelabgabe){
                        
                        $gesamtePunkte += $einzelabgabe->GesamtePunkt;
                        
//                         echo "<pre>";
//                         print_r($einzelabgabe->Benutzer_MarterikelNr);
//                         echo "ok";
//                         print_r($einzelabgabe->GesamtePunkt);
//                         echo "</pre>";
                        
                    }
                    //print_r($gesamtePunkte);
                    //print_r($zulassung);
                    //print_r($vollePunkt);
                    //if($gesamtePunkte*)
                    if($gesamtePunkte >= $zulassung*$vollePunkt){
                        
                        $model = new BenutzerAnmeldenKlausur;
                        $model->Benutzer_MarterikelNr = $benutzer->MarterikelNr;
                        $model->KlausurID = $id;
                        $model->Anmeldungszeit = time();
                        $model->save();
                    }else{
                        $model = BenutzerAnmeldenKlausur::findOne($benutzer->MarterikelNr,$id);
                        if ($model != null) {
                            $model->delete();
                        }else{
                            return; 
                        }
                    }
                }
            }      
        }
    }  
    
}
