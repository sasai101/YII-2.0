<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "benutzer_anmelden_klausur".
 *
 * @property int $Benutzer-MarterikelNr
 * @property int $Klausur-ID
 * @property int $Anmeldungszeit
 * @property string $Anmeldungsstatus
 *
 * @property Benutzer $benutzer-MarterikelNr
 * @property Klausur $klausur-
 */
class BenutzerAnmeldenKlausur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'benutzer_anmelden_klausur';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Benutzer-MarterikelNr', 'Klausur-ID', 'Anmeldungsstatus'], 'required'],
            [['Benutzer-MarterikelNr', 'Klausur-ID', 'Anmeldungszeit'], 'integer'],
            [['Anmeldungsstatus'], 'string', 'max' => 255],
            [['Benutzer-MarterikelNr', 'Klausur-ID'], 'unique', 'targetAttribute' => ['Benutzer-MarterikelNr', 'Klausur-ID']],
            [['Benutzer-MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['Benutzer-MarterikelNr' => 'marterikelnr']],
            [['Klausur-ID'], 'exist', 'skipOnError' => true, 'targetClass' => Klausur::className(), 'targetAttribute' => ['Klausur-ID' => 'klausur-id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Benutzer-MarterikelNr' => 'Benutzer  Marterikel Nr',
            'Klausur-ID' => 'Klausur  ID',
            'Anmeldungszeit' => 'Anmeldungszeit',
            'Anmeldungsstatus' => 'Anmeldungsstatus',
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
    public function getKlausur()
    {
        return $this->hasOne(Klausur::className(), ['klausur-id' => 'Klausur-ID']);
    }
}
