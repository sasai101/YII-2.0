<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "modul".
 *
 * @property int $ModulID
 * @property string $Bezeichnung
 *
 * @property Klausur[] $klausurs
 * @property ModulAnmeldenBenutzer[] $modulAnmeldenBenutzers
 * @property Benutzer[] $benutzerMarterikelNrs
 * @property ModulGehoertKlausurnote[] $modulGehoertKlausurnotes
 * @property Klausurnote[] $klausurnotes
 * @property ModulLeitetProfessor[] $modulLeitetProfessors
 * @property Professor[] $professorMarterikelNrs
 * @property Uebung[] $uebungs
 */
class Modul extends \yii\db\ActiveRecord
{
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modul';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Bezeichnung'], 'required'],
            [['Bezeichnung'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ModulID' => 'Modul ID',
            'Bezeichnung' => 'Bezeichnung',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKlausurs()
    {
        return $this->hasMany(Klausur::className(), ['ModulID' => 'ModulID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModulAnmeldenBenutzers()
    {
        return $this->hasMany(ModulAnmeldenBenutzer::className(), ['ModulID' => 'ModulID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzerMarterikelNrs()
    {
        return $this->hasMany(Benutzer::className(), ['marterikelnr' => 'Benutzer_MarterikelNr'])->viaTable('modul_anmelden_benutzer', ['ModulID' => 'ModulID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModulGehoertKlausurnotes()
    {
        return $this->hasMany(ModulGehoertKlausurnote::className(), ['Modul_ID' => 'ModulID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKlausurnotes()
    {
        return $this->hasMany(Klausurnote::className(), ['KlausurnoteID' => 'Klausurnote_ID'])->viaTable('modul_gehoert_klausurnote', ['Modul_ID' => 'ModulID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModulLeitetProfessors()
    {
        return $this->hasMany(ModulLeitetProfessor::className(), ['ModulID' => 'ModulID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessorMarterikelNrs()
    {
        return $this->hasMany(Professor::className(), ['marterikelnr' => 'Professor_MarterikelNr'])->viaTable('modul_leitet_professor', ['ModulID' => 'ModulID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungs()
    {
        return $this->hasMany(Uebung::className(), ['ModulID' => 'ModulID']);
    }
    
    /*
     * finde alle Model, gibt die gesamte Anzahl von Modul zurück
     */ 
    public static function alleModul()
    {
        return Modul::find()->count();
    }
   
}
