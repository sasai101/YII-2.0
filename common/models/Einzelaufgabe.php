<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "einzelaufgabe".
 *
 * @property int $EinzelaufgabeID
 * @property int $AbgabeID
 * @property int $AufgabeNr
 * @property string $Text
 * @property string $Datein
 * @property double $Punkte
 * @property string $Bewertung
 *
 * @property Abgabe $abgabe
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
            [['AbgabeID', 'AufgabeNr'], 'required'],
            [['AbgabeID', 'AufgabeNr'], 'integer'],
            [['Text', 'Datein'], 'string'],
            [['Punkte'], 'number'],
            [['Bewertung'], 'string', 'max' => 255],
            [['AbgabeID'], 'exist', 'skipOnError' => true, 'targetClass' => Abgabe::className(), 'targetAttribute' => ['AbgabeID' => 'AbgabeID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'EinzelaufgabeID' => 'Einzelaufgabe ID',
            'AbgabeID' => 'Abgabe ID',
            'AufgabeNr' => 'Aufgabe Nr',
            'Text' => 'Text',
            'Datein' => 'Datein',
            'Punkte' => 'Punkte',
            'Bewertung' => 'Bewertung',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbgabe()
    {
        return $this->hasOne(Abgabe::className(), ['AbgabeID' => 'AbgabeID']);
    }
}
