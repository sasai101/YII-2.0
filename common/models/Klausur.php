<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "klausur".
 *
 * @property int $Klausur-ID
 * @property int $Mitarbeiter-MarterikelNr
 * @property int $Modul-ID
 * @property int $Kreditpunkt
 * @property string $Prüfungsdatum
 * @property string $Raum
 * @property string $Bezeichnung
 * @property int $Max.Punkte
 * @property int $1.0
 * @property int $1.3
 * @property int $1.7
 * @property int $2.0
 * @property int $2.3
 * @property int $3.0
 * @property int $3.3
 * @property int $3.7
 * @property int $4.0
 * @property int $5.0
 *
 * @property BenutzerAnmeldenKlausur[] $benutzerAnmeldenKlausurs
 * @property Benutzer[] $benutzer-MarterikelNrs
 * @property Mitarbeiter $mitarbeiter-MarterikelNr
 * @property Modul $modul-
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
            [['Mitarbeiter-MarterikelNr', 'Modul-ID', 'Kreditpunkt', 'Prüfungsdatum', 'Raum', 'Bezeichnung', 'Max.Punkte', '1.0', '1.3', '1.7', '2.0', '2.3', '3.0', '3.3', '3.7', '4.0', '5.0'], 'required'],
            [['Mitarbeiter-MarterikelNr', 'Modul-ID', 'Kreditpunkt', 'Max.Punkte', '1.0', '1.3', '1.7', '2.0', '2.3', '3.0', '3.3', '3.7', '4.0', '5.0'], 'integer'],
            [['Prüfungsdatum', 'Raum', 'Bezeichnung'], 'string', 'max' => 255],
            [['Mitarbeiter-MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Mitarbeiter::className(), 'targetAttribute' => ['Mitarbeiter-MarterikelNr' => 'marterikelnr']],
            [['Modul-ID'], 'exist', 'skipOnError' => true, 'targetClass' => Modul::className(), 'targetAttribute' => ['Modul-ID' => 'modul-id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Klausur-ID' => 'Klausur  ID',
            'Mitarbeiter-MarterikelNr' => 'Mitarbeiter  Marterikel Nr',
            'Modul-ID' => 'Modul  ID',
            'Kreditpunkt' => 'Kreditpunkt',
            'Prüfungsdatum' => 'Prüfungsdatum',
            'Raum' => 'Raum',
            'Bezeichnung' => 'Bezeichnung',
            'Max.Punkte' => 'Max  Punkte',
            '1.0' => '1 0',
            '1.3' => '1 3',
            '1.7' => '1 7',
            '2.0' => '2 0',
            '2.3' => '2 3',
            '3.0' => '3 0',
            '3.3' => '3 3',
            '3.7' => '3 7',
            '4.0' => '4 0',
            '5.0' => '5 0',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzerAnmeldenKlausurs()
    {
        return $this->hasMany(BenutzerAnmeldenKlausur::className(), ['Klausur-ID' => 'klausur-id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzerMarterikelNrs()
    {
        return $this->hasMany(Benutzer::className(), ['marterikelnr' => 'Benutzer-MarterikelNr'])->viaTable('benutzer_anmelden_klausur', ['Klausur-ID' => 'klausur-id']);
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
    public function getModul()
    {
        return $this->hasOne(Modul::className(), ['modul-id' => 'Modul-ID']);
    }
}
