<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "benutzer_teilnimmt_uebungsgruppe".
 *
 * @property int $Benuter-MarterikelNr
 * @property int $Übungsgruppe-ID
 *
 * @property Benutzer $benuter-MarterikelNr
 * @property Uebungsgruppe $Übungsgruppe-
 */
class BenutzerTeilnimmtUebungsgruppe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'benutzer_teilnimmt_uebungsgruppe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Benuter-MarterikelNr', 'Übungsgruppe-ID'], 'required'],
            [['Benuter-MarterikelNr', 'Übungsgruppe-ID'], 'integer'],
            [['Benuter-MarterikelNr', 'Übungsgruppe-ID'], 'unique', 'targetAttribute' => ['Benuter-MarterikelNr', 'Übungsgruppe-ID']],
            [['Benuter-MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['Benuter-MarterikelNr' => 'marterikelnr']],
            [['Übungsgruppe-ID'], 'exist', 'skipOnError' => true, 'targetClass' => Uebungsgruppe::className(), 'targetAttribute' => ['Übungsgruppe-ID' => 'übungsgruppe-id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Benuter-MarterikelNr' => 'Benuter  Marterikel Nr',
            'Übungsgruppe-ID' => 'Übungsgruppe  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenuterMarterikelNr()
    {
        return $this->hasOne(Benutzer::className(), ['marterikelnr' => 'Benuter-MarterikelNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getÜbungsgruppe()
    {
        return $this->hasOne(Uebungsgruppe::className(), ['übungsgruppe-id' => 'Übungsgruppe-ID']);
    }
}
