<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "korrektor".
 *
 * @property int $MarterikelNr
 *
 * @property Abgabe[] $abgabes
 * @property Benutzer $marterikelNr
 */
class Korrektor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'korrektor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MarterikelNr'], 'required'],
            [['MarterikelNr'], 'integer'],
            [['MarterikelNr'], 'unique'],
            [['MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['MarterikelNr' => 'marterikelnr']],
       
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MarterikelNr' => 'Marterikel Nr',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbgabes()
    {
        return $this->hasMany(Abgabe::className(), ['Korrektor_MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarterikelNr()
    {
        return $this->hasOne(Benutzer::className(), ['marterikelnr' => 'MarterikelNr']);
    }
    
    /*
     *  Durch die eigene Getter-Funktion die folgende Werte rauszuholen, für index des Korrektores 
     */
    public function getBenutzername()
    {
        return $this->marterikelNr->Benutzername;
    }
    
    public function getVorname()
    {
        return $this->marterikelNr->Vorname;
    }
    
    public function getNachname()
    {
        return $this->marterikelNr->Nachname;
    }
    
    public function getEmail()
    {
        return $this->marterikelNr->email;
    }
    
    public function getProfiefoto()
    {
        return $this->marterikelNr->Profiefoto;
    }
    /*
     * bis her
     */
    
    
    
    
    
    
    
}
