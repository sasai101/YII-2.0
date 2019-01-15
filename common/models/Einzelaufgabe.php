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
            [['Text', 'Bewertung'], 'string'],
            //Validierung
            
            [['Punkte'], 'double'],
            
            [['Bewertung'], 'string', 'max' => 255],
            [['AbgabeID'], 'exist', 'skipOnError' => true, 'targetClass' => Abgabe::className(), 'targetAttribute' => ['AbgabeID' => 'AbgabeID']],
            //['Punkte', 'punkteCheck']
            
        ];
    }
    
    public function punkteCheck($attribute, $params) {
        $model = Uebungsblaetter::findOne($this->abgabe->uebungsblaetter->UebungsblatterID);
        if( $model->GesamtePunkte < (int)$this->Punkte){
            $this->addError($attribute,'Das Prüfungsdatum muss grösser als heute sein.');
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
            'Text' => 'Antwort',
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
