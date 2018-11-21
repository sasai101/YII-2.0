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
 * @property Benutzer[] $benutzerMarterikelNrs
 * @property Mitarbeiter $mitarbeiterMarterikelNr
 * @property Modul $modul
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
            [['Mitarbeiter_MarterikelNr', 'ModulID', 'Kreditpunkt', 'Pruefungsdatum', 'Raum', 'Bezeichnung', 'Max_Punkte', '1.0', '1.3', '1.7', '2.0', '2.3', '3.0', '3.3', '3.7', '4.0', '5.0'], 'required'],
            [['Mitarbeiter_MarterikelNr', 'ModulID', 'Kreditpunkt', 'Max_Punkte', '1.0', '1.3', '1.7', '2.0', '2.3', '3.0', '3.3', '3.7', '4.0', '5.0'], 'integer'],
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
            'Mitarbeiter_MarterikelNr' => 'Mitarbeiter  Marterikel Nr',
            'ModulID' => 'Modul ID',
            'Kreditpunkt' => 'Kreditpunkt',
            'Pruefungsdatum' => 'Pruefungsdatum',
            'Raum' => 'Raum',
            'Bezeichnung' => 'Bezeichnung',
            'Max_Punkte' => 'Max  Punkte',
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
}
