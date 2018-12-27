<?php

namespace common\models;

use Yii;
use phpDocumentor\Reflection\Types\Null_;

/**
 * This is the model class for table "einzelaufgabe".
 *
 * @property int $EinzelaufgabeID
 * @property int $AbgabeID
 * @property int $AufgabeNr
 * @property string $Text
 * @property string $Datein
 * @property double $Punkte
 * @property string $Bewertung
 *
 * @property Abgabe $abgabe
 */
class Einzelaufgabe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */ 
    public static function tableName()
    {
        return 'einzelaufgabe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['AbgabeID', 'AufgabeNr'], 'required'],
            [['AbgabeID', 'AufgabeNr'], 'integer'],
            [['Text', 'Datein', 'Bewertung'], 'string'],
            [['Punkte'], 'number'],
            [['Bewertung'], 'string', 'max' => 255],
            [['AbgabeID'], 'exist', 'skipOnError' => true, 'targetClass' => Abgabe::className(), 'targetAttribute' => ['AbgabeID' => 'AbgabeID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'EinzelaufgabeID' => 'Einzelaufgabe ID',
            'AbgabeID' => 'Abgabe ID',
            'AufgabeNr' => 'Aufgabe Nr',
            'Text' => 'Text',
            'Datein' => 'Datein',
            'Punkte' => 'Punkte',
            'Bewertung' => 'Bewertung',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbgabe()
    {
        return $this->hasOne(Abgabe::className(), ['AbgabeID' => 'AbgabeID']);
    }
    
    /*test
     * die befrsave Funktion umschreiben ,damit die Datum richtig und automatisch gespeichert zu werden
     */
    public function beforeSave($insert)
    {
        
        // die orignale Funktion erstmal durchfueren,
        if(parent::beforeSave($insert))
        {
            $model= Abgabe::findOne($this->AbgabeID);
            $note = 0;
            foreach ($model->einzelaufgabes as $aufgabe){
                echo "ok";
                if($aufgabe->Punkte==null){
                    $model->GesamtePunkt==null;
                    $model->Korrektor_MarterikelNr = Yii::$app->user->identity->MarterikelNr;
                    $note = 0;
                    break;
                }else{
                    $note += $aufgabe->Punkte;
                }
            }
            if( $note != 0){
                if($model->GesamtePunkt > $model->uebungsblaetter->GesamtePunkte){
                    alert("Der gesamte Punkt muss kleiner als ".$this->uebungsblaetter->GesamtePunkte."sein");
                    return false;
                }elseif ($model->GesamtePunkt < 0){
                    alert("Der gesamte Punkt muss größer gleiche als 0 sein");
                    return false;
                }else{
                    $model->GesamtePunkt = $note;
                    $model->KorregierteZeit = time();
                    $model->Korrektor_MarterikelNr = Yii::$app->user->identity->MarterikelNr;
                }
            }
            $model->save(false);
            echo "<pre>";
            print_r($model);
            echo "</pre>";
            exit(0);
            return true;
            
        }
        else
        {
            return false;
        }
    } 
}
