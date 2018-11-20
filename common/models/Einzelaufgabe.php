<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "einzelaufgabe".
 *
 * @property int $Einzelaufgabe-ID
 * @property int $Abgabe-ID
 * @property int $Übungsblätter-ID
 * @property int $AufgabeNr
 * @property string $Text
 * @property string $Datein
 * @property double $Punkte
 * @property string $Bewertung
 * @property int $Max.Punkt
 *
 * @property Abgabe $abgabe-
 * @property Uebungsblaetter $Übungsblätter-
 */
class Einzelaufgabe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'einzelaufgabe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Abgabe-ID', 'Übungsblätter-ID', 'AufgabeNr', 'Max.Punkt'], 'required'],
            [['Abgabe-ID', 'Übungsblätter-ID', 'AufgabeNr', 'Max.Punkt'], 'integer'],
            [['Text', 'Datein'], 'string'],
            [['Punkte'], 'number'],
            [['Bewertung'], 'string', 'max' => 255],
            [['Abgabe-ID'], 'exist', 'skipOnError' => true, 'targetClass' => Abgabe::className(), 'targetAttribute' => ['Abgabe-ID' => 'abgabe-id']],
            [['Übungsblätter-ID'], 'exist', 'skipOnError' => true, 'targetClass' => Uebungsblaetter::className(), 'targetAttribute' => ['Übungsblätter-ID' => 'übungsblätter-id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Einzelaufgabe-ID' => 'Einzelaufgabe  ID',
            'Abgabe-ID' => 'Abgabe  ID',
            'Übungsblätter-ID' => 'Übungsblätter  ID',
            'AufgabeNr' => 'Aufgabe Nr',
            'Text' => 'Text',
            'Datein' => 'Datein',
            'Punkte' => 'Punkte',
            'Bewertung' => 'Bewertung',
            'Max.Punkt' => 'Max  Punkt',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbgabe()
    {
        return $this->hasOne(Abgabe::className(), ['abgabe-id' => 'Abgabe-ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getÜbungsblätter()
    {
        return $this->hasOne(Uebungsblaetter::className(), ['übungsblätter-id' => 'Übungsblätter-ID']);
    }
}
