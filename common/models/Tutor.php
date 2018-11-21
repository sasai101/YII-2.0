<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tutor".
 *
 * @property int $MarterikelNr
 *
 * @property Benutzer $marterikelNr
 * @property Uebungsgruppe[] $uebungsgruppes
 */
class Tutor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tutor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MarterikelNr'], 'required'],
            [['MarterikelNr'], 'integer'],
            [['MarterikelNr'], 'unique'],
            [['MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['MarterikelNr' => 'marterikelnr']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MarterikelNr' => 'Marterikel Nr',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarterikelNr()
    {
        return $this->hasOne(Benutzer::className(), ['marterikelnr' => 'MarterikelNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungsgruppes()
    {
        return $this->hasMany(Uebungsgruppe::className(), ['Tutor_MarterikelNr' => 'marterikelnr']);
    }
}
