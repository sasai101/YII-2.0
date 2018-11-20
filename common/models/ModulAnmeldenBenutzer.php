<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "modul_anmelden_benutzer".
 *
 * @property int $Modul-ID
 * @property int $Benutzer-MarterikelNr
 *
 * @property Modul $modul-
 * @property Benutzer $benutzer-MarterikelNr
 */
class ModulAnmeldenBenutzer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modul_anmelden_benutzer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Modul-ID', 'Benutzer-MarterikelNr'], 'required'],
            [['Modul-ID', 'Benutzer-MarterikelNr'], 'integer'],
            [['Modul-ID', 'Benutzer-MarterikelNr'], 'unique', 'targetAttribute' => ['Modul-ID', 'Benutzer-MarterikelNr']],
            [['Modul-ID'], 'exist', 'skipOnError' => true, 'targetClass' => Modul::className(), 'targetAttribute' => ['Modul-ID' => 'modul-id']],
            [['Benutzer-MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['Benutzer-MarterikelNr' => 'marterikelnr']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Modul-ID' => 'Modul  ID',
            'Benutzer-MarterikelNr' => 'Benutzer  Marterikel Nr',
        ];
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
    public function getBenutzerMarterikelNr()
    {
        return $this->hasOne(Benutzer::className(), ['marterikelnr' => 'Benutzer-MarterikelNr']);
    }
}
