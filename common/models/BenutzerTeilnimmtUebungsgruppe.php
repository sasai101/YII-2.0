<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "benutzer_teilnimmt_uebungsgruppe".
 *
 * @property int $Benuter_MarterikelNr
 * @property int $UebungsgruppeID
 *
 * @property Benutzer $benuterMarterikelNr
 * @property Uebungsgruppe $uebungsgruppe
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
            [['Benuter_MarterikelNr', 'UebungsgruppeID'], 'required'],
            [['Benuter_MarterikelNr', 'UebungsgruppeID'], 'integer'],
            [['Benuter_MarterikelNr', 'UebungsgruppeID'], 'unique', 'targetAttribute' => ['Benuter_MarterikelNr', 'UebungsgruppeID']],
            [['Benuter_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['Benuter_MarterikelNr' => 'marterikelnr']],
            [['UebungsgruppeID'], 'exist', 'skipOnError' => true, 'targetClass' => Uebungsgruppe::className(), 'targetAttribute' => ['UebungsgruppeID' => 'UebungsgruppeID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Benuter_MarterikelNr' => 'Benuter  Marterikel Nr',
            'UebungsgruppeID' => 'Uebungsgruppe ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenuterMarterikelNr()
    {
        return $this->hasOne(Benutzer::className(), ['marterikelnr' => 'Benuter_MarterikelNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungsgruppe()
    {
        return $this->hasOne(Uebungsgruppe::className(), ['UebungsgruppeID' => 'UebungsgruppeID']);
    }
}
