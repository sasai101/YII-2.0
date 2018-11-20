<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uebungsblaetter".
 *
 * @property int $Übungsblätter-ID
 * @property int $Übungs-ID
 * @property int $ÜbungsNr
 * @property int $Anzahl der Aufgabe
 * @property int $Deadline
 * @property int $Ausgabedatum
 * @property string $Datein
 *
 * @property Einzelaufgabe[] $einzelaufgabes
 * @property Uebung $Übungs-
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
            [['Übungs-ID', 'ÜbungsNr', 'Anzahl der Aufgabe', 'Datein'], 'required'],
            [['Übungs-ID', 'ÜbungsNr', 'Anzahl der Aufgabe', 'Deadline', 'Ausgabedatum'], 'integer'],
            [['Datein'], 'string', 'max' => 225],
            [['Übungs-ID'], 'exist', 'skipOnError' => true, 'targetClass' => Uebung::className(), 'targetAttribute' => ['Übungs-ID' => 'übungs-id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Übungsblätter-ID' => 'Übungsblätter  ID',
            'Übungs-ID' => 'Übungs  ID',
            'ÜbungsNr' => 'Übungs Nr',
            'Anzahl der Aufgabe' => 'Anzahl Der  Aufgabe',
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
        return $this->hasMany(Einzelaufgabe::className(), ['Übungsblätter-ID' => 'übungsblätter-id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getÜbungs()
    {
        return $this->hasOne(Uebung::className(), ['übungs-id' => 'Übungs-ID']);
    }
}
