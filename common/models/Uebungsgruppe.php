<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uebungsgruppe".
 *
 * @property int $UebungsgruppeID
 * @property int $UebungsID
 * @property int $Tutor_MarterikelNr
 * @property int $Anzahl_der_Personen
 * @property int $GruppenNr
 * @property int $Max_Person
 *
 * @property BenutzerTeilnimmtUebungsgruppe[] $benutzerTeilnimmtUebungsgruppes
 * @property Benutzer[] $benuterMarterikelNrs
 * @property Uebung $uebungs
 * @property Tutor $tutorMarterikelNr
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
            [['UebungsID', 'Tutor_MarterikelNr', 'Anzahl_der_Personen', 'GruppenNr', 'Max_Person'], 'required'],
            [['UebungsID', 'Tutor_MarterikelNr', 'Anzahl_der_Personen', 'GruppenNr', 'Max_Person'], 'integer'],
            [['UebungsID'], 'exist', 'skipOnError' => true, 'targetClass' => Uebung::className(), 'targetAttribute' => ['UebungsID' => 'UebungsID']],
            [['Tutor_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Tutor::className(), 'targetAttribute' => ['Tutor_MarterikelNr' => 'marterikelnr']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UebungsgruppeID' => 'Uebungsgruppe ID',
            'UebungsID' => 'Uebungs ID',
            'Tutor_MarterikelNr' => 'Tutor  Marterikel Nr',
            'Anzahl_der_Personen' => 'Anzahl Der  Personen',
            'GruppenNr' => 'Gruppen Nr',
            'Max_Person' => 'Max  Person',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzerTeilnimmtUebungsgruppes()
    {
        return $this->hasMany(BenutzerTeilnimmtUebungsgruppe::className(), ['UebungsgruppeID' => 'UebungsgruppeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenuterMarterikelNrs()
    {
        return $this->hasMany(Benutzer::className(), ['marterikelnr' => 'Benuter_MarterikelNr'])->viaTable('benutzer_teilnimmt_uebungsgruppe', ['UebungsgruppeID' => 'UebungsgruppeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungs()
    {
        return $this->hasOne(Uebung::className(), ['UebungsID' => 'UebungsID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTutorMarterikelNr()
    {
        return $this->hasOne(Tutor::className(), ['marterikelnr' => 'Tutor_MarterikelNr']);
    }
}
