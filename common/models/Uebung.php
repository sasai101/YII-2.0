<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uebung".
 *
 * @property int $UebungsID
 * @property int $ModulID
 * @property int $Mitarbeiter_MarterikelNr
 * @property string $Bezeichnung
 *
 * @property Mitarbeiter $mitarbeiterMarterikelNr
 * @property Modul $modul
 * @property Uebungsblaetter[] $uebungsblaetters
 * @property Uebungsgruppe[] $uebungsgruppes
 */
class Uebung extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uebung';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // sonst geht das beim Modulherstellung nicht mehr weiter
            //[['ModulID', 'Mitarbeiter_MarterikelNr', 'Bezeichnung'], 'required'],
            [['Mitarbeiter_MarterikelNr', 'Bezeichnung'], 'required'],
            [['ModulID', 'Mitarbeiter_MarterikelNr'], 'integer'],
            [['Bezeichnung'], 'string', 'max' => 255],
            [['Mitarbeiter_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Mitarbeiter::className(), 'targetAttribute' => ['Mitarbeiter_MarterikelNr' => 'marterikelnr']],
            [['ModulID'], 'exist', 'skipOnError' => true, 'targetClass' => Modul::className(), 'targetAttribute' => ['ModulID' => 'ModulID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UebungsID' => 'Uebungs ID',
            'ModulID' => 'Modul ID',
            'Mitarbeiter_MarterikelNr' => 'Mitarbeiter  Marterikel Nr',
            'Bezeichnung' => 'Bezeichnung',
        ];
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
        return $this->hasOne(Modul::className(), ['ModulID' => 'ModulID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungsblaetters()
    {
        return $this->hasMany(Uebungsblaetter::className(), ['UebungsID' => 'UebungsID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungsgruppes()
    {
        return $this->hasMany(Uebungsgruppe::className(), ['UebungsID' => 'UebungsID']);
    }
    
    /*
     * Gibt den Name von Professor zurück
     */
    public function getBenutzerNname($id)
    {
        $model = Benutzer::findOne($id);
        $Name = $model->Vorname." ".$model->Nachname;
        return  $Name;
    }
}

