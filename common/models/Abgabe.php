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
 * @property int $UebungsblaetterID
 *
 * @property Benutzer $benutzerMarterikelNr
 * @property Korrektor $korrektorMarterikelNr
 * @property Uebungsblaetter $uebungsblaetter
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
            [['Benutzer_MarterikelNr', 'Korrektor_MarterikelNr', 'GesamtePunkt', 'UebungsblaetterID'], 'required'],
            [['Benutzer_MarterikelNr', 'Korrektor_MarterikelNr', 'KorregierteZeit', 'AbgabeZeit', 'GesamtePunkt', 'UebungsblaetterID'], 'integer'],
            [['Benutzer_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['Benutzer_MarterikelNr' => 'marterikelnr']],
            [['Korrektor_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Korrektor::className(), 'targetAttribute' => ['Korrektor_MarterikelNr' => 'marterikelnr']],
            [['UebungsblaetterID'], 'exist', 'skipOnError' => true, 'targetClass' => Uebungsblaetter::className(), 'targetAttribute' => ['UebungsblaetterID' => 'uebungsblatterid']],
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
            'UebungsblaetterID' => 'Uebungsblaetter ID',
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
    public function getUebungsblaetter()
    {
        return $this->hasOne(Uebungsblaetter::className(), ['uebungsblatterid' => 'UebungsblaetterID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEinzelaufgabes()
    {
        return $this->hasMany(Einzelaufgabe::className(), ['AbgabeID' => 'AbgabeID']);
    }
}
