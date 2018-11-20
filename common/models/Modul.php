<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "modul".
 *
 * @property int $Modul-ID
 * @property string $Bezeichnung
 *
 * @property Klausur[] $klausurs
 * @property ModulAnmeldenBenutzer[] $modulAnmeldenBenutzers
 * @property Benutzer[] $benutzer-MarterikelNrs
 * @property ModulGehoertKlausurnote[] $modulGehoertKlausurnotes
 * @property Klausurnote[] $klausurnote-s
 * @property ModulLeitetProfessor[] $modulLeitetProfessors
 * @property Professor[] $professor-MarterikelNrs
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
            'Modul-ID' => 'Modul  ID',
            'Bezeichnung' => 'Bezeichnung',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKlausurs()
    {
        return $this->hasMany(Klausur::className(), ['Modul-ID' => 'modul-id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModulAnmeldenBenutzers()
    {
        return $this->hasMany(ModulAnmeldenBenutzer::className(), ['Modul-ID' => 'modul-id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzerMarterikelNrs()
    {
        return $this->hasMany(Benutzer::className(), ['marterikelnr' => 'Benutzer-MarterikelNr'])->viaTable('modul_anmelden_benutzer', ['Modul-ID' => 'modul-id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModulGehoertKlausurnotes()
    {
        return $this->hasMany(ModulGehoertKlausurnote::className(), ['Modul-ID' => 'modul-id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKlausurnotes()
    {
        return $this->hasMany(Klausurnote::className(), ['klausurnote-id' => 'Klausurnote-ID'])->viaTable('modul_gehoert_klausurnote', ['Modul-ID' => 'modul-id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModulLeitetProfessors()
    {
        return $this->hasMany(ModulLeitetProfessor::className(), ['Modul-ID' => 'modul-id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessorMarterikelNrs()
    {
        return $this->hasMany(Professor::className(), ['marterikelnr' => 'Professor-MarterikelNr'])->viaTable('modul_leitet_professor', ['Modul-ID' => 'modul-id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungs()
    {
        return $this->hasMany(Uebung::className(), ['Modul-ID' => 'modul-id']);
    }
}
