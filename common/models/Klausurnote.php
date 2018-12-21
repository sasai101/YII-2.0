<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "klausurnote".
 *
 * @property int $KlausurnoteID
 * @property int $Mitarbeiter_MarterikelNr
 * @property int $Benutzer_MarterikelNr
 * @property double $Note
 * @property string $Bezeichnung
 * @property double $Punkt
 * @property int $KorregierteZeit
 * @property int $ModulID
 *
 * @property Benutzer $benutzerMarterikelNr
 * @property Mitarbeiter $mitarbeiterMarterikelNr
 * @property Modul $modul
 */
class Klausurnote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'klausurnote';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Mitarbeiter_MarterikelNr', 'Benutzer_MarterikelNr', 'Bezeichnung', 'ModulID'], 'required'],
            [['Mitarbeiter_MarterikelNr', 'Benutzer_MarterikelNr', 'KorregierteZeit', 'ModulID'], 'integer'],
            [['Note', 'Punkt'], 'number'],
            [['Bezeichnung'], 'string', 'max' => 255],
            [['Benutzer_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['Benutzer_MarterikelNr' => 'marterikelnr']],
            [['Mitarbeiter_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Mitarbeiter::className(), 'targetAttribute' => ['Mitarbeiter_MarterikelNr' => 'marterikelnr']],
            [['ModulID'], 'exist', 'skipOnError' => true, 'targetClass' => Modul::className(), 'targetAttribute' => ['ModulID' => 'modulid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KlausurnoteID' => 'Klausurnote ID',
            'Mitarbeiter_MarterikelNr' => 'Mitarbeiter',
            'Benutzer_MarterikelNr' => 'Benutzer_MarterikelNr',
            'Note' => 'Note',
            'Bezeichnung' => 'Bezeichnung',
            'Punkt' => 'Punkte',
            'KorregierteZeit' => 'Korregierte Zeit',
            'ModulID' => 'Modul',
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
    public function getMitarbeiterMarterikelNr()
    {
        return $this->hasOne(Mitarbeiter::className(), ['marterikelnr' => 'Mitarbeiter_MarterikelNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModul()
    {
        return $this->hasOne(Modul::className(), ['modulid' => 'ModulID']);
    }
    
    /*
     * weitere Attribute
     */
    public function getVorname() 
    {    
        return $this->benutzerMarterikelNr->Vorname;
    }
    
    public function getNachname()
    {
        return $this->benutzerMarterikelNr->Nachname;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}
