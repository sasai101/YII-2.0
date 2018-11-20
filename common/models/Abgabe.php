<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "abgabe".
 *
 * @property int $Abgabe-ID
 * @property int $Benutzer-MarterikelNr
 * @property int $Korrektor-MarterikelNr
 * @property int $Korregierte Zeit
 * @property int $Abgabe Zeit
 * @property int $Gesamte Punkt
 *
 * @property Benutzer $benutzer-MarterikelNr
 * @property Korrektor $korrektor-MarterikelNr
 * @property Einzelaufgabe[] $einzelaufgabes
 */
class Abgabe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'abgabe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Benutzer-MarterikelNr', 'Korrektor-MarterikelNr'], 'required'],
            [['Benutzer-MarterikelNr', 'Korrektor-MarterikelNr', 'Korregierte Zeit', 'Abgabe Zeit', 'Gesamte Punkt'], 'integer'],
            [['Benutzer-MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['Benutzer-MarterikelNr' => 'marterikelnr']],
            [['Korrektor-MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Korrektor::className(), 'targetAttribute' => ['Korrektor-MarterikelNr' => 'marterikelnr']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Abgabe-ID' => 'Abgabe  ID',
            'Benutzer-MarterikelNr' => 'Benutzer  Marterikel Nr',
            'Korrektor-MarterikelNr' => 'Korrektor  Marterikel Nr',
            'Korregierte Zeit' => 'Korregierte  Zeit',
            'Abgabe Zeit' => 'Abgabe  Zeit',
            'Gesamte Punkt' => 'Gesamte  Punkt',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzerMarterikelNr()
    {
        return $this->hasOne(Benutzer::className(), ['marterikelnr' => 'Benutzer-MarterikelNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKorrektorMarterikelNr()
    {
        return $this->hasOne(Korrektor::className(), ['marterikelnr' => 'Korrektor-MarterikelNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEinzelaufgabes()
    {
        return $this->hasMany(Einzelaufgabe::className(), ['Abgabe-ID' => 'abgabe-id']);
    }
}
