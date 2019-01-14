<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mitarbeiter".
 *
 * @property int $MarterikelNr
 * @property string $Buero
 *
 * @property Klausur[] $klausurs
 * @property Klausurnote[] $klausurnotes
 * @property Benutzer $marterikelNr
 * @property Uebung[] $uebungs
 */
class Mitarbeiter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mitarbeiter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MarterikelNr'], 'required'],
            [['MarterikelNr'], 'integer'],
            [['Buero'], 'string', 'max' => 255],
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
            'Buero' => 'Buero',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKlausurs()
    {
        return $this->hasMany(Klausur::className(), ['Mitarbeiter_MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKlausurnotes()
    {
        return $this->hasMany(Klausurnote::className(), ['Mitarbeiter_MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarterikelNr()
    {
        return $this->hasOne(Benutzer::className(), ['marterikelnr' => 'MarterikelNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungs()
    {
        return $this->hasMany(Uebung::className(), ['Mitarbeiter_MarterikelNr' => 'marterikelnr']);
    }
    
    /*
     * gibt die Benutzername zurück, damit es in der Gridview von Mitarbeit, Professor, Korrektor und Totur aufrufen kann
     */
    public function getBenutzername()
    {
        return $this->marterikelNr->Benutzername;
    }
    
    /*
     * gibt die Vorname zurück, damit es in der Gridview von Mitarbeit, Professor, Korrektor und Totur aufrufen kann
     */
    public function getVorname() 
    {
        return $this->marterikelNr->Vorname;
    }
    
    /*
     * gibt die Nachname zurück, damit es in der Gridview von Mitarbeit, Professor, Korrektor und Totur aufrufen kann
     */
    public function getNachname()
    {
        return $this->marterikelNr->Nachname;
    }
  
    /*
     * gibt die Email zurück, damit es in der Gridview von Mitarbeit, Professor, Korrektor und Totur aufrufen kann
     */
    public function getEmail()
    {
        return $this->marterikelNr->email;
    }
    /*
     * gibt die Email zurück, damit es in der Gridview von Mitarbeit, Professor, Korrektor und Totur aufrufen kann
     */
    public function getProfiefoto()
    {
        return $this->marterikelNr->Profiefoto;
    }
    
    /*
     * git Vorname von allen Mitarbeiter zurück für Dropdownlist bei ModulCreate
     */
    public static function mitarbeiterName() {
        //$model = Professor::find();
        $model = Benutzer::find();
        
        return $model->join('INNER JOIN','mitarbeiter','benutzer.MarterikelNr=mitarbeiter.MarterikelNr')
        ->select(['Benutzer.Vorname','Benutzer.MarterikelNr'])
        ->indexBy('MarterikelNr')
        ->column();
    }
    
    // Löschen die alle Item, welche mit Mitarbeiter eine Bindung hat
    public static function DeleteMitarbeiter($marterikelNr) {
        Klausurnote::DeleteKlausurnotMitMitarbeitMar($marterikelNr);
        Klausur::DeleteKlausurMitMitarbeitMar($marterikelNr);
        Uebung::DeleteUebungMitMitarbeitMar($marterikelNr);
        Mitarbeiter::DeletAuthAssignment($marterikelNr);
    }
    
    /*
     * Anzahl der unkorregierte Abgabe von Mitarbeiter(header)
     */
    public static function AnzahlunkorregierteAbgabe($mitMarterikelNr) {
        $model = Uebung::find()->where(['Mitarbeiter_MarterikelNr'=>$mitMarterikelNr])->all();
        $anzahl = 0;
        foreach ($model as $uebung){
            $anzahl += Uebung::AnzahlunkorregierteAbgabe($uebung->UebungsID);
        }
        return $anzahl;
    }
    
    /*
     * Delete aus AuthAssignment
     */
    public static function DeletAuthAssignment($marterikelNr) {
        AuthAssignment::findOne('mitar',$marterikelNr)->delete();
    }
}
