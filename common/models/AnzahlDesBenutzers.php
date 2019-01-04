<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "anzahl_des_benutzers".
 *
 * @property int $id
 * @property int $Datum
 * @property int $Anzahlen
 */
class AnzahlDesBenutzers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anzahl_des_benutzers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Datum', 'Anzahlen','Anzahlen'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Datum' => 'Datum',
            'Anzahlen' => 'Anzahlen',
        ];
    }
    
    /*
     * Echart für Hauptseite index Datum
     */
    public static function ZeitInArray() {
        $model = AnzahlDesBenutzers::find()->all();
        $arrayDatum = array();
        foreach ($model as $datum){
            array_push($arrayDatum, date("d.m.y",$datum->Datum));
        }
        return $arrayDatum;
    }
    
    /*
     * Echart für Hauptseite index
     */
    public static function AnzahlInArray() {
        $model = AnzahlDesBenutzers::find()->all();
        $arrayAnzahl = array();
        foreach ($model as $anzahl){
            array_push($arrayAnzahl, $anzahl->Anzahlen);
        }
        return $arrayAnzahl;
    }
}
