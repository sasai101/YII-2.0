<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uebungsblaetter".
 *
 * @property int $UebungsblatterID
 * @property int $UebungsID
 * @property int $UebungsNr
 * @property int $Anzahl_der_Aufgabe
 * @property int $Deadline
 * @property int $Ausgabedatum
 * @property string $Datein
 *
 * @property Einzelaufgabe[] $einzelaufgabes
 * @property Uebung $uebungs
 */
class Uebungsblaetter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uebungsblaetter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UebungsID', 'UebungsNr', 'Anzahl_der_Aufgabe', 'Datein'], 'required'],
            [['UebungsID', 'UebungsNr', 'Anzahl_der_Aufgabe', 'Deadline', 'Ausgabedatum'], 'integer'],
            [['Datein'], 'string', 'max' => 225],
            [['UebungsID'], 'exist', 'skipOnError' => true, 'targetClass' => Uebung::className(), 'targetAttribute' => ['UebungsID' => 'UebungsID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UebungsblatterID' => 'Uebungsblatter ID',
            'UebungsID' => 'Uebungs ID',
            'UebungsNr' => 'Uebungs Nr',
            'Anzahl_der_Aufgabe' => 'Anzahl Der  Aufgabe',
            'Deadline' => 'Deadline',
            'Ausgabedatum' => 'Ausgabedatum',
            'Datein' => 'Datein',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEinzelaufgabes()
    {
        return $this->hasMany(Einzelaufgabe::className(), ['UebungsblaetterID' => 'UebungsblatterID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungs()
    {
        return $this->hasOne(Uebung::className(), ['UebungsID' => 'UebungsID']);
    }
}
