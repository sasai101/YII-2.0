<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "modul_gehoert_klausurnote".
 *
 * @property int $Modul_ID
 * @property int $Klausurnote_ID
 *
 * @property Modul $modul
 * @property Klausurnote $klausurnote
 */
class ModulGehoertKlausurnote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modul_gehoert_klausurnote';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Modul_ID', 'Klausurnote_ID'], 'required'],
            [['Modul_ID', 'Klausurnote_ID'], 'integer'],
            [['Modul_ID', 'Klausurnote_ID'], 'unique', 'targetAttribute' => ['Modul_ID', 'Klausurnote_ID']],
            [['Modul_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Modul::className(), 'targetAttribute' => ['Modul_ID' => 'ModulID']],
            [['Klausurnote_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Klausurnote::className(), 'targetAttribute' => ['Klausurnote_ID' => 'KlausurnoteID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Modul_ID' => 'Modul  ID',
            'Klausurnote_ID' => 'Klausurnote  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModul()
    {
        return $this->hasOne(Modul::className(), ['ModulID' => 'Modul_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKlausurnote()
    {
        return $this->hasOne(Klausurnote::className(), ['KlausurnoteID' => 'Klausurnote_ID']);
    }
}
