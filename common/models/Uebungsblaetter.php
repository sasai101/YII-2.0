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
 * @property int $GesamtePunkte
 *
 * @property Einzelaufgabe[] $einzelaufgabes
 * @property Uebung $uebungs
 */
class Uebungsblaetter extends \yii\db\ActiveRecord
{
    
    public $file;
    
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
            [['UebungsID', 'UebungsNr', 'Anzahl_der_Aufgabe', 'Datein', 'GesamtePunkte', 'Deadline', 'Ausgabedatum'], 'required'],
            [['UebungsID', 'UebungsNr', 'Anzahl_der_Aufgabe', 'Deadline', 'Ausgabedatum', 'GesamtePunkte'], 'integer'],
            [['Datein'], 'string', 'max' => 225],
            [['UebungsID'], 'exist', 'skipOnError' => true, 'targetClass' => Uebung::className(), 'targetAttribute' => ['UebungsID' => 'UebungsID']],
            
            [['file'],'file', 'extensions' => 'pdf' ,'checkExtensionByMimeType'=>false],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UebungsblatterID' => 'Uebungsblatter ID',
            'UebungsID' => 'Übungsname',
            'UebungsNr' => 'Übungsnummer',
            'Anzahl_der_Aufgabe' => 'Insgesamte Aufgabe',
            'Deadline' => 'Deadline',
            'Ausgabedatum' => 'Ausgabedatum',
            'Datein' => 'Übungsblätter',
            'file' => 'blätte',
            'GesamtePunkte' => 'Gesamte Punkte',
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
    
    /*
     * gibt die Anzahl der verfügbaren Übungsblätter
     */
    public static function getAnzahlderBlaetter($id)
    {
        return Uebungsblaetter::find()->where(['UebungsID'=>$id])->count();
    }
    
    
    /*test
     * die befrsave Funktion umschreiben ,damit die Datum richtig und automatisch gespeichert zu werden
     */
    public function beforeSave($insert)
    {
        
        // die orignale Funktion erstmal durchfueren,
        if(parent::beforeSave($insert))
        {
            if($insert)
            {
                $this->Ausgabedatum = time();
            }
            return true;
        }
        else
        {
            return false;
        }
    }
}
