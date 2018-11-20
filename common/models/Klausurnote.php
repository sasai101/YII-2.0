<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "klausurnote".
 *
 * @property int $Klausurnote-ID
 * @property int $Mitarbeiter-MarterikelNr
 * @property int $Benutzer-MarterikelNr
 * @property int $Note
 * @property string $Bezeichnung
 * @property double $Punkt
 * @property int $Korregierte Zeit
 *
 * @property Benutzer $benutzer-MarterikelNr
 * @property Mitarbeiter $mitarbeiter-MarterikelNr
 * @property ModulGehoertKlausurnote[] $modulGehoertKlausurnotes
 * @property Modul[] $modul-s
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
            [['Mitarbeiter-MarterikelNr', 'Benutzer-MarterikelNr', 'Bezeichnung', 'Punkt'], 'required'],
            [['Mitarbeiter-MarterikelNr', 'Benutzer-MarterikelNr', 'Note', 'Korregierte Zeit'], 'integer'],
            [['Punkt'], 'number'],
            [['Bezeichnung'], 'string', 'max' => 255],
            [['Benutzer-MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['Benutzer-MarterikelNr' => 'marterikelnr']],
            [['Mitarbeiter-MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Mitarbeiter::className(), 'targetAttribute' => ['Mitarbeiter-MarterikelNr' => 'marterikelnr']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Klausurnote-ID' => 'Klausurnote  ID',
            'Mitarbeiter-MarterikelNr' => 'Mitarbeiter  Marterikel Nr',
            'Benutzer-MarterikelNr' => 'Benutzer  Marterikel Nr',
            'Note' => 'Note',
            'Bezeichnung' => 'Bezeichnung',
            'Punkt' => 'Punkt',
            'Korregierte Zeit' => 'Korregierte  Zeit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzerMarterikelNr()
    {
        return $this->hasOne(Benutzer::className(), ['marterikelnr' => 'Benutzer-MarterikelNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMitarbeiterMarterikelNr()
    {
        return $this->hasOne(Mitarbeiter::className(), ['marterikelnr' => 'Mitarbeiter-MarterikelNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModulGehoertKlausurnotes()
    {
        return $this->hasMany(ModulGehoertKlausurnote::className(), ['Klausurnote-ID' => 'klausurnote-id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModuls()
    {
        return $this->hasMany(Modul::className(), ['modul-id' => 'Modul-ID'])->viaTable('modul_gehoert_klausurnote', ['Klausurnote-ID' => 'klausurnote-id']);
    }
}
