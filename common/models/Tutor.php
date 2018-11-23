<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tutor".
 *
 * @property int $MarterikelNr
 *
 * @property Benutzer $marterikelNr
 * @property Uebungsgruppe[] $uebungsgruppes
 */
class Tutor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tutor';
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
    public function getMarterikelNr()
    {
        return $this->hasOne(Benutzer::className(), ['marterikelnr' => 'MarterikelNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungsgruppes()
    {
        return $this->hasMany(Uebungsgruppe::className(), ['Tutor_MarterikelNr' => 'marterikelnr']);
    }
    
    
    /*
     * gibt die Benutzername zurück, damit es in der Gridview von Mitarbeit, Professor, Korrektor und Totur aufrufen kann
     */
    public function getBenutzername()
    {
        return $this->marterikelNr->Benutzername;
    }
    
    /*
     * gibt die Vorname zurück, damit es in der Gridview von Mitarbeit, Professor, Korrektor und Totur aufrufen kann
     */
    public function getVorname()
    {
        return $this->marterikelNr->Vorname;
    }
    
    /*
     * gibt die Nachname zurück, damit es in der Gridview von Mitarbeit, Professor, Korrektor und Totur aufrufen kann
     */
    public function getNachname()
    {
        return $this->marterikelNr->Nachname;
    }
    
    /*
     * gibt die Email zurück, damit es in der Gridview von Mitarbeit, Professor, Korrektor und Totur aufrufen kann
     */
    public function getEmail()
    {
        return $this->marterikelNr->email;
    }
    
    
    
    
    
    
    
}
