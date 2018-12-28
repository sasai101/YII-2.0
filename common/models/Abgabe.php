<?php

namespace common\models;

use Yii;
use common\widgets\Alert;

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
    
    public function setMarterikelNr($value) {
        $this->Korrektor_MarterikelNr = $value;
    }
    
    
    /*test
     * die befrsave Funktion umschreiben ,damit die Datum richtig und automatisch gespeichert zu werden
     */
    public function beforeSave($insert)
    {
        
        // die orignale Funktion erstmal durchfueren,
        if(parent::beforeSave($insert))
        {
            $model = $this->einzelaufgabes;
            $note = 0;
            foreach ($model as $aufgabe){
                if($aufgabe->Punkte==null){
                    $this->GesamtePunkt==null;
                    $this->Korrektor_MarterikelNr = Yii::$app->user->identity->MarterikelNr;
                    break;
                }else{
                    $note += $aufgabe->Punkte;
                }
            }
            if( $note != 0){
                if($note > $this->uebungsblaetter->GesamtePunkte){
                    //alert("Der gesamte Punkt muss kleiner als ".$this->uebungsblaetter->GesamtePunkte."sein");
                    
                    Alert::begin([
                        'options'=>[
                            'class'=>'alert-warning',
                        ],
                    ]);
                    echo "Der gesamte Punkt muss kleiner als ".$this->uebungsblaetter->GesamtePunkte."sein";
                    return false;
                }elseif ($note < 0){
                    //echo alert("Der gesamte Punkt muss größer gleiche als 0 sein");
                    Alert::begin([
                        'options'=>[
                            'class'=>'alert-warning',
                        ],
                    ]);
                    echo "Der gesamte Punkt muss größer gleiche als 0 sein";
                    return false;
                }else{
                    $this->KorregierteZeit = time();
                    $this->GesamtePunkt = $note;
                    $this->setMarterikelNr(Yii::$app->user->identity->MarterikelNr);
                }
            }
            return true;
            
        }
        else
        {
            return false;
        }
    } 
    
}
