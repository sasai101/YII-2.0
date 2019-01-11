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
 * @property string $Deadline
 * @property int $Ausgabedatum
 * @property string $Datein
 * @property int $GesamtePunkte
 *
 * @property Abgabe[] $abgabes
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
            [['UebungsID', 'UebungsNr', 'Anzahl_der_Aufgabe', 'Datein', 'GesamtePunkte', 'Ausgabedatum'], 'required'],
            [['UebungsID', 'UebungsNr', 'Anzahl_der_Aufgabe', 'Ausgabedatum', 'GesamtePunkte'], 'integer'],
            [['Deadline'], 'safe'],
            [['Datein'], 'string', 'max' => 225],
            [['UebungsID'], 'exist', 'skipOnError' => true, 'targetClass' => Uebung::className(), 'targetAttribute' => ['UebungsID' => 'UebungsID']],
            
            [['file'],'file', 'extensions' => 'pdf' ,'checkExtensionByMimeType'=>false],
            
            ['Deadline', 'DeadlineCheck'],
            ['Anzahl_der_Aufgabe', 'AnzahlAufgabeCheck'],
            ['GesamtePunkte', 'GesamtePunkteCheck']
        ];
    }
    
    public function DeadlineCheck($attribute, $params) {
        $heute = date('d-m-Y H:i:s');
        $dethdatum = date($this->Deadline);
        if( $dethdatum < $heute){
            $this->addError($attribute,'Das Deadline muss grösser als heute sein.');
        }
    }
    public function AnzahlAufgabeCheck($attribute,$param) {
        if($this->Anzahl_der_Aufgabe<0){
            $this->addError($attribute,'Das Anzahl der Aufgaben darf nicht neagativ sein');
        }else if ($this->Anzahl_der_Aufgabe > 2000){
            $this->addError($attribute, 'Das Anzahl der Aufgaben darf nicht größer als 2000 sein');
        }
    }
    public function GesamtePunkteCheck($attribute,$param) {
        if($this->GesamtePunkte<0){
            $this->addError($attribute,'Die gesamte Punkte der Aufgaben darf nicht neagativ sein');
        }else if ($this->GesamtePunkte > 2000){
            $this->addError($attribute, 'Das gesamte Punkte darf nicht größer als 2000 sein');
        }
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
    public function getAbgabes()
    {
        return $this->hasMany(Abgabe::className(), ['UebungsblaetterID' => 'uebungsblatterid']);
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
    
    // Übungsblätter löschen mit UebungsID
    public static function DeleteUebungsblatt($uebungsID) {
        $modelBlaetter = Uebungsblaetter::find()->where(['UebungsID'=>$uebungsID])->all();
        foreach ($modelBlaetter as $blatt){
            //Abgabe löschen
            Abgabe::DeleteAbgabe($blatt->UebungsblatterID);
            //Blatt löschen
            $blatt->delete();
        }
    }
    
    /*
     * Uebungsblaetter löschen 
     */
    public static function AllesLoeschen($uebungsblaetterID) {
        Abgabe::DeleteAbgabe($uebungsblaetterID);
    }
    
    
    /*
     * Aftersave, alle Abgabe automatisch erstellen
     */
    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        if ($insert) {
            $model = Uebung::MarterikelNrMitGruppeID($this->UebungsID);
            // für jeden Person in diesen Uebung eine Abgabe erstellen
            foreach ($model as $key=>$einzel){
                $modelAgabe = new Abgabe;
                $modelAgabe->Benutzer_MarterikelNr = $key;
                $modelAgabe->UebungsgruppenID = $einzel;
                $modelAgabe->UebungsblaetterID =$this->UebungsblatterID;
                $modelAgabe->AbgabeZeit = null;
                $modelAgabe->save();
            }
        }
    }
    
}
