<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uebungsgruppe".
 *
 * @property int $Übungsgruppe-ID
 * @property int $Übungs-ID
 * @property int $Tutor-MarterikelNr
 * @property int $Anzahl der Personen
 * @property int $GruppenNr
 * @property int $Max Person
 *
 * @property BenutzerTeilnimmtUebungsgruppe[] $benutzerTeilnimmtUebungsgruppes
 * @property Benutzer[] $benuter-MarterikelNrs
 * @property Uebung $Übungs-
 * @property Tutor $tutor-MarterikelNr
 */
class Uebungsgruppe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uebungsgruppe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Übungs-ID', 'Tutor-MarterikelNr', 'Anzahl der Personen', 'GruppenNr', 'Max Person'], 'required'],
            [['Übungs-ID', 'Tutor-MarterikelNr', 'Anzahl der Personen', 'GruppenNr', 'Max Person'], 'integer'],
            [['Übungs-ID'], 'exist', 'skipOnError' => true, 'targetClass' => Uebung::className(), 'targetAttribute' => ['Übungs-ID' => 'übungs-id']],
            [['Tutor-MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Tutor::className(), 'targetAttribute' => ['Tutor-MarterikelNr' => 'marterikelnr']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Übungsgruppe-ID' => 'Übungsgruppe  ID',
            'Übungs-ID' => 'Übungs  ID',
            'Tutor-MarterikelNr' => 'Tutor  Marterikel Nr',
            'Anzahl der Personen' => 'Anzahl Der  Personen',
            'GruppenNr' => 'Gruppen Nr',
            'Max Person' => 'Max  Person',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzerTeilnimmtUebungsgruppes()
    {
        return $this->hasMany(BenutzerTeilnimmtUebungsgruppe::className(), ['Übungsgruppe-ID' => 'übungsgruppe-id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenuterMarterikelNrs()
    {
        return $this->hasMany(Benutzer::className(), ['marterikelnr' => 'Benuter-MarterikelNr'])->viaTable('benutzer_teilnimmt_uebungsgruppe', ['Übungsgruppe-ID' => 'übungsgruppe-id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getÜbungs()
    {
        return $this->hasOne(Uebung::className(), ['übungs-id' => 'Übungs-ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTutorMarterikelNr()
    {
        return $this->hasOne(Tutor::className(), ['marterikelnr' => 'Tutor-MarterikelNr']);
    }
}
