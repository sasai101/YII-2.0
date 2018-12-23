<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "klausur".
 *
 * @property int $KlausurID
 * @property int $Mitarbeiter_MarterikelNr
 * @property int $ModulID
 * @property int $Kreditpunkt
 * @property string $Pruefungsdatum
 * @property string $Raum
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
            [['Mitarbeiter_MarterikelNr', 'ModulID', 'Kreditpunkt', 'Pruefungsdatum', 'Raum', 'Bezeichnung', 'Max_Punkte', 'punkt1_0', 'punkt1_3', 'punkt1_7', 'punkt2_0', 'punkt2_3', 'punkt2_7', 'punkt3_0', 'punkt3_3', 'punkt3_7', 'punkt4_0'], 'required'],
            [['Mitarbeiter_MarterikelNr', 'ModulID', 'Kreditpunkt', 'Max_Punkte', 'punkt1_0', 'punkt1_3', 'punkt1_7', 'punkt2_0', 'punkt2_3', 'punkt2_7', 'punkt3_0', 'punkt3_3', 'punkt3_7', 'punkt4_0'], 'integer'],
            [['Pruefungsdatum', 'Raum', 'Bezeichnung'], 'string', 'max' => 255],
            [['Mitarbeiter_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Mitarbeiter::className(), 'targetAttribute' => ['Mitarbeiter_MarterikelNr' => 'marterikelnr']],
            [['ModulID'], 'exist', 'skipOnError' => true, 'targetClass' => Modul::className(), 'targetAttribute' => ['ModulID' => 'ModulID']],
        ];
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
            'Raum' => 'Raum',
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
        return $this->hasMany(Klausurnote::className(), ['KlausurID' => 'klausurid']);
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
    
    
    
    
    
    
    
    
    
    
    
    
}
