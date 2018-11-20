<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "modul_gehoert_klausurnote".
 *
 * @property int $Modul-ID
 * @property int $Klausurnote-ID
 *
 * @property Modul $modul-
 * @property Klausurnote $klausurnote-
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
            [['Modul-ID', 'Klausurnote-ID'], 'required'],
            [['Modul-ID', 'Klausurnote-ID'], 'integer'],
            [['Modul-ID', 'Klausurnote-ID'], 'unique', 'targetAttribute' => ['Modul-ID', 'Klausurnote-ID']],
            [['Modul-ID'], 'exist', 'skipOnError' => true, 'targetClass' => Modul::className(), 'targetAttribute' => ['Modul-ID' => 'modul-id']],
            [['Klausurnote-ID'], 'exist', 'skipOnError' => true, 'targetClass' => Klausurnote::className(), 'targetAttribute' => ['Klausurnote-ID' => 'klausurnote-id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Modul-ID' => 'Modul  ID',
            'Klausurnote-ID' => 'Klausurnote  ID',
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
    public function getKlausurnote()
    {
        return $this->hasOne(Klausurnote::className(), ['klausurnote-id' => 'Klausurnote-ID']);
    }
}
