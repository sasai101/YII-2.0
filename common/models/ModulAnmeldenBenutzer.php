<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "modul_anmelden_benutzer".
 *
 * @property int $ModulID
 * @property int $Benutzer_MarterikelNr
 *
 * @property Modul $modul
 * @property Benutzer $benutzerMarterikelNr
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
            [['ModulID', 'Benutzer_MarterikelNr'], 'required'],
            [['ModulID', 'Benutzer_MarterikelNr'], 'integer'],
            [['ModulID', 'Benutzer_MarterikelNr'], 'unique', 'targetAttribute' => ['ModulID', 'Benutzer_MarterikelNr']],
            [['ModulID'], 'exist', 'skipOnError' => true, 'targetClass' => Modul::className(), 'targetAttribute' => ['ModulID' => 'ModulID']],
            [['Benutzer_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['Benutzer_MarterikelNr' => 'marterikelnr']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ModulID' => 'Modul ID',
            'Benutzer_MarterikelNr' => 'Benutzer  Marterikel Nr',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModul()
    {
        return $this->hasOne(Modul::className(), ['ModulID' => 'ModulID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzerMarterikelNr()
    {
        return $this->hasOne(Benutzer::className(), ['marterikelnr' => 'Benutzer_MarterikelNr']);
    }
}
