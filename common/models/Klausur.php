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
 * @property int $punkt3_0
 * @property int $punkt3_3
 * @property int $punkt3_7
 * @property int $punkt4_0
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
            [['Mitarbeiter_MarterikelNr', 'ModulID', 'Kreditpunkt', 'Pruefungsdatum', 'Raum', 'Bezeichnung', 'Max_Punkte', 'punkt1_0', 'punkt1_3', 'punkt1_7', 'punkt2_0', 'punkt2_3', 'punkt3_0', 'punkt3_3', 'punkt3_7', 'punkt4_0'], 'required'],
            [['Mitarbeiter_MarterikelNr', 'ModulID', 'Kreditpunkt', 'Max_Punkte', 'punkt1_0', 'punkt1_3', 'punkt1_7', 'punkt2_0', 'punkt2_3', 'punkt3_0', 'punkt3_3', 'punkt3_7', 'punkt4_0'], 'integer'],
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
            'punkt1_0' => 'Punkt1 0',
            'punkt1_3' => 'Punkt1 3',
            'punkt1_7' => 'Punkt1 7',
            'punkt2_0' => 'Punkt2 0',
            'punkt2_3' => 'Punkt2 3',
            'punkt3_0' => 'Punkt3 0',
            'punkt3_3' => 'Punkt3 3',
            'punkt3_7' => 'Punkt3 7',
            'punkt4_0' => 'Punkt4 0',
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
    
    /*
     *  Gibt die Mitarbeitername für Klausurerstellung zurück
     */
    public function getMitarbeitername($param) {
        $model = Benutzer::findOne($param);
        $mitarbeitername = $model->Vorname.' '.$model->Nachname;
        return $mitarbeitername;
    }
}
