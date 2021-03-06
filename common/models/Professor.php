<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "professor".
 *
 * @property int $MarterikelNr
 * @property string $Buero
 *
 * @property ModulLeitetProfessor[] $modulLeitetProfessors
 * @property Modul[] $moduls
 * @property Benutzer $marterikelNr
 */
class Professor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'professor';
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
    public function getModulLeitetProfessors()
    {
        return $this->hasMany(ModulLeitetProfessor::className(), ['Professor_MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModuls()
    {
        return $this->hasMany(Modul::className(), ['ModulID' => 'ModulID'])->viaTable('modul_leitet_professor', ['Professor_MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarterikelNr()
    {
        return $this->hasOne(Benutzer::className(), ['marterikelnr' => 'MarterikelNr']);
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
    public function getProfiefoto() 
    {
        return $this->marterikelNr->Profiefoto;
    }
    
    /*
     * git Vorname von allen Rrofessoren zurück für Dropdownlist bei ModulCreate
     */
    public static function profName() {
        //$model = Professor::find();
        $model = Benutzer::find();
        
        return $model->join('INNER JOIN','professor','benutzer.MarterikelNr=professor.MarterikelNr')
                     ->select(['Benutzer.Vorname','Benutzer.MarterikelNr'])
                     ->indexBy('MarterikelNr')
                     ->column();
    }
    
    // Alle Item in der Tabelle Modul_leitet_Professor beim bestimmten Prof löschen
    public static function DeleteModulLeitePro($marterikelNr) {
        $modelProf = ModulLeitetProfessor::find()->where(['Professor_MarterikelNr'=>$marterikelNr])->all();
        foreach ($modelProf as $prof){
            $prof->delete();
        }
        Professor::DeletAuthAssignment($marterikelNr);
    }
    
    /*
     * Alle Module von bestimmten Professore
     */
    public static function AlleModul($marterikelNr) {
        return ModulLeitetProfessor::find()->where(['Professor_MarterikelNr'=>$marterikelNr])->all();
    }
    
    /*
     * Anzahl der Module von bestimmten Professore geleitet werden
     */
    public static function AnzahlModul($marterikelNr) {
        return ModulLeitetProfessor::find()->where(['Professor_MarterikelNr'=>$marterikelNr])->count();
    }
    
    /*
     * Anzahl der unkorregierte Abgabe von Professor(header)
     */
    public static function AnzahlunkorregierteAbgabe($modulID) {
        $model = Uebung::find()->where(['ModulID'=>$modulID])->all();
        $anzahl = 0;
        foreach ($model as $uebung){
            $anzahl += Uebung::AnzahlunkorregierteAbgabe($uebung->UebungsID);
        }
        return $anzahl;
    }
    
    /*
     * Anzahl der unkorregierte Abgabe von Professor(header)
     */
    public static function AnzahlAlleunkorregierteAbgabe($marterikelNr) {
        
        $modulModul = ModulLeitetProfessor::find()->where(['Professor_MarterikelNr'=>$marterikelNr])->all();
        $anzahl = 0;
        foreach ($modulModul as $modul){
            $model = Uebung::find()->where(['ModulID'=>$modul->ModulID])->all();
            foreach ($model as $uebung){
                $anzahl += Uebung::AnzahlunkorregierteAbgabe($uebung->UebungsID);
            }
        }
        return $anzahl;
    }
    
    /*
     * Delete aus AuthAssignment
     */
    public static function DeletAuthAssignment($marterikelNr) {
        AuthAssignment::findOne('prof',$marterikelNr)->delete();
    }
}
