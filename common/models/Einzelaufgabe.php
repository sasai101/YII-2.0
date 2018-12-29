<?php

namespace common\models;

use Yii;
use phpDocumentor\Reflection\Types\Null_;
use yii\bootstrap\Alert;

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
            //Validierung
            [['Punkte'], 'punktgrenze'],
            
            [['Bewertung'], 'string', 'max' => 255],
            [['AbgabeID'], 'exist', 'skipOnError' => true, 'targetClass' => Abgabe::className(), 'targetAttribute' => ['AbgabeID' => 'AbgabeID']],
            
        ];
    }
    // validierung fur Punkte
    public function punktgrenze($attribute, $params)
    {
        $modelUebungsblaetter = Uebungsblaetter::findOne($this->abgabe->UebungsblaetterID);
        
        if(!is_double($this->Punkte)){
            
            if($this->Punkte > $modelUebungsblaetter->GesamtePunkte || $this->Punkte < 0){
                $this->addError($attribute,"Punkt muss zwischen ".$modelUebungsblaetter->GesamtePunkte." und 0 sein");
            }
        }else {
            $this->addError($attribute,"1Punkt muss ein Zahl zwischen ".$modelUebungsblaetter->GesamtePunkte." und 0 sein");
        }
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
    
}
