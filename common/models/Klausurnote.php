<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "klausurnote".
 *
 * @property int $KlausurnoteID
 * @property int $Mitarbeiter_MarterikelNr
 * @property int $Benutzer_MarterikelNr
 * @property int $Note
 * @property string $Bezeichnung
 * @property double $Punkt
 * @property int $KorregierteZeit
 *
 * @property Benutzer $benutzerMarterikelNr
 * @property Mitarbeiter $mitarbeiterMarterikelNr
 * @property ModulGehoertKlausurnote[] $modulGehoertKlausurnotes
 * @property Modul[] $moduls
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
            [['Mitarbeiter_MarterikelNr', 'Benutzer_MarterikelNr', 'Bezeichnung', 'Punkt'], 'required'],
            [['Mitarbeiter_MarterikelNr', 'Benutzer_MarterikelNr', 'Note', 'KorregierteZeit'], 'integer'],
            [['Punkt'], 'number'],
            [['Bezeichnung'], 'string', 'max' => 255],
            [['Benutzer_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['Benutzer_MarterikelNr' => 'marterikelnr']],
            [['Mitarbeiter_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Mitarbeiter::className(), 'targetAttribute' => ['Mitarbeiter_MarterikelNr' => 'marterikelnr']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KlausurnoteID' => 'Klausurnote ID',
            'Mitarbeiter_MarterikelNr' => 'Mitarbeiter  Marterikel Nr',
            'Benutzer_MarterikelNr' => 'Benutzer  Marterikel Nr',
            'Note' => 'Note',
            'Bezeichnung' => 'Bezeichnung',
            'Punkt' => 'Punkt',
            'KorregierteZeit' => 'Korregierte Zeit',
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
    public function getModulGehoertKlausurnotes()
    {
        return $this->hasMany(ModulGehoertKlausurnote::className(), ['Klausurnote_ID' => 'KlausurnoteID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModuls()
    {
        return $this->hasMany(Modul::className(), ['ModulID' => 'Modul_ID'])->viaTable('modul_gehoert_klausurnote', ['Klausurnote_ID' => 'KlausurnoteID']);
    }
}
