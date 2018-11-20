<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uebung".
 *
 * @property int $Übungs-ID
 * @property int $Modul-ID
 * @property int $Mitarbeiter-MarterikelNr
 * @property string $Bezeichnung
 *
 * @property Mitarbeiter $mitarbeiter-MarterikelNr
 * @property Modul $modul-
 * @property Uebungsblaetter[] $uebungsblaetters
 * @property Uebungsgruppe[] $uebungsgruppes
 */
class Uebung extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uebung';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Modul-ID', 'Mitarbeiter-MarterikelNr', 'Bezeichnung'], 'required'],
            [['Modul-ID', 'Mitarbeiter-MarterikelNr'], 'integer'],
            [['Bezeichnung'], 'string', 'max' => 255],
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
            'Übungs-ID' => 'Übungs  ID',
            'Modul-ID' => 'Modul  ID',
            'Mitarbeiter-MarterikelNr' => 'Mitarbeiter  Marterikel Nr',
            'Bezeichnung' => 'Bezeichnung',
        ];
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungsblaetters()
    {
        return $this->hasMany(Uebungsblaetter::className(), ['Übungs-ID' => 'übungs-id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungsgruppes()
    {
        return $this->hasMany(Uebungsgruppe::className(), ['Übungs-ID' => 'übungs-id']);
    }
}
