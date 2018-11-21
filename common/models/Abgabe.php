<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "abgabe".
 *
 * @property int $AbgabeID
 * @property int $Benutzer_MarterikelNr
 * @property int $Korrektor_MarterikelNr
 * @property int $KorregierteZeit
 * @property int $AbgabeZeit
 * @property int $GesamtePunkt
 *
 * @property Benutzer $benutzerMarterikelNr
 * @property Korrektor $korrektorMarterikelNr
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
            [['Benutzer_MarterikelNr', 'Korrektor_MarterikelNr'], 'required'],
            [['Benutzer_MarterikelNr', 'Korrektor_MarterikelNr', 'KorregierteZeit', 'AbgabeZeit', 'GesamtePunkt'], 'integer'],
            [['Benutzer_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['Benutzer_MarterikelNr' => 'marterikelnr']],
            [['Korrektor_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Korrektor::className(), 'targetAttribute' => ['Korrektor_MarterikelNr' => 'marterikelnr']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'AbgabeID' => 'Abgabe ID',
            'Benutzer_MarterikelNr' => 'Benutzer  Marterikel Nr',
            'Korrektor_MarterikelNr' => 'Korrektor  Marterikel Nr',
            'KorregierteZeit' => 'Korregierte Zeit',
            'AbgabeZeit' => 'Abgabe Zeit',
            'GesamtePunkt' => 'Gesamte Punkt',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzerMarterikelNr()
    {
        return $this->hasOne(Benutzer::className(), ['marterikelnr' => 'Benutzer_MarterikelNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKorrektorMarterikelNr()
    {
        return $this->hasOne(Korrektor::className(), ['marterikelnr' => 'Korrektor_MarterikelNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEinzelaufgabes()
    {
        return $this->hasMany(Einzelaufgabe::className(), ['AbgabeID' => 'AbgabeID']);
    }
}
