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
 * @property int $UebungsgruppenID 
 *
 * @property Benutzer $benutzerMarterikelNr
 * @property Korrektor $korrektorMarterikelNr
 * @property Uebungsblaetter $uebungsblaetter 
 * @property Uebungsgruppe $uebungsgruppen 
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
            [['Benutzer_MarterikelNr', 'UebungsblaetterID', 'UebungsgruppenID'], 'required'],
            [['Benutzer_MarterikelNr', 'Korrektor_MarterikelNr', 'KorregierteZeit', 'AbgabeZeit', 'GesamtePunkt', 'UebungsblaetterID', 'UebungsgruppenID'], 'integer'],
            [['Benutzer_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['Benutzer_MarterikelNr' => 'marterikelnr']],
            [['Korrektor_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Korrektor::className(), 'targetAttribute' => ['Korrektor_MarterikelNr' => 'marterikelnr']],
            [['UebungsblaetterID'], 'exist', 'skipOnError' => true, 'targetClass' => Uebungsblaetter::className(), 'targetAttribute' => ['UebungsblaetterID' => 'uebungsblatterid']],
            [['UebungsgruppenID'], 'exist', 'skipOnError' => true, 'targetClass' => Uebungsgruppe::className(), 'targetAttribute' => ['UebungsgruppenID' => 'uebungsgruppeid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'AbgabeID' => 'Abgabe ID',
            'Benutzer_MarterikelNr' => 'Marterikel Nr',
            'Korrektor_MarterikelNr' => 'Korrektor',
            'KorregierteZeit' => 'Korregierte Zeit',
            'AbgabeZeit' => 'Abgabe Zeit',
            'GesamtePunkt' => 'Gesamte Punkt',
            'UebungsblaetterID' => 'Übungsblätter',
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
    public function getUebungsgruppen()
    {
        return $this->hasOne(Uebungsgruppe::className(), ['uebungsgruppeid' => 'UebungsgruppenID']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */ 
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEinzelaufgabes()
    {
        return $this->hasMany(Einzelaufgabe::className(), ['AbgabeID' => 'AbgabeID']);
    }
}
