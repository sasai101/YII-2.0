<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "benutzer_teilnimmt_uebungsgruppe".
 *
 * @property int $Benuter_MarterikelNr
 * @property int $UebungsgruppeID
 *
 * @property Benutzer $benuterMarterikelNr
 * @property Uebungsgruppe $uebungsgruppe
 */
class BenutzerTeilnimmtUebungsgruppe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'benutzer_teilnimmt_uebungsgruppe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Benuter_MarterikelNr', 'UebungsgruppeID'], 'required'],
            [['Benuter_MarterikelNr', 'UebungsgruppeID'], 'integer'],
            [['Benuter_MarterikelNr', 'UebungsgruppeID'], 'unique', 'targetAttribute' => ['Benuter_MarterikelNr', 'UebungsgruppeID']],
            [['Benuter_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['Benuter_MarterikelNr' => 'marterikelnr']],
            [['UebungsgruppeID'], 'exist', 'skipOnError' => true, 'targetClass' => Uebungsgruppe::className(), 'targetAttribute' => ['UebungsgruppeID' => 'UebungsgruppeID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Benuter_MarterikelNr' => 'Benuter  Marterikel Nr',
            'UebungsgruppeID' => 'Uebungsgruppe ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenuterMarterikelNr()
    {
        return $this->hasOne(Benutzer::className(), ['marterikelnr' => 'Benuter_MarterikelNr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUebungsgruppe()
    {
        return $this->hasOne(Uebungsgruppe::className(), ['UebungsgruppeID' => 'UebungsgruppeID']);
    }
    
    //Benutzer_teilnimmt_uebungsgruppe mit UebungsgruppeID löschen
    public static function DeleteBenutzerTeiUebungsgruppe($uebungsgruppeID) {
        $modelTeilnahmGruppe = BenutzerTeilnimmtUebungsgruppe::find()->where(['UebungsgruppeID'=>$uebungsgruppeID])->all();
        foreach ($modelTeilnahmGruppe as $teilnahmer){
            $teilnahmer->delete();
        }
    }
    
    /*
     *  Benutzer teilname löschen mit MarterikelNr
     */
    public static function DeleteBenutzanGruppe($marterikelNr){
        $modulBenutzerGruppe = BenutzerTeilnimmtUebungsgruppe::find()->where(['Benuter_MarterikelNr'=>$marterikelNr])->all();
        foreach ($modulBenutzerGruppe as $item){
            $item->delete();
        }
    }
    
    /*
     *  Benutzer überprüfen ob Benutzer schon Gruppe hat oder nicht
     */
    public static function BenutzerPruefen($marterikelNr){
        $model = BenutzerTeilnimmtUebungsgruppe::find()->where(['Benuter_MarterikelNr'=>$marterikelNr])->all();
        $flag = true;
        foreach ($model as $gruppe){
            if($gruppe == null){
                $flag = false;
            }
        }
        return $flag;
    }
    
    /*
     * Uebungsgrupppe anmelden
     */
    public static function BenutzeranmeldenUebungsgruppe($id,$marterikelNr){
        $model = new BenutzerTeilnimmtUebungsgruppe;
        $model->UebungsgruppeID = $id;
        $model->Benuter_MarterikelNr = $marterikelNr;
        $model->save();
        $modelGruppe = Uebungsgruppe::findOne($id);
        $modelGruppe->Anzahl_der_Personen += 1;
        $modelGruppe->save();
    }
    
    /*
     * Überprufen ob Benutzer schon an der Übung teinimmt oder nicht
     */
    public static function BenutzerMeldungStatus($uebungsID,$marterikelNr) {
        $modelUebung = Uebung::findOne($uebungsID);
        $flag = 1;
        foreach ($modelUebung->uebungsgruppes as $gruppe){
            if(BenutzerTeilnimmtUebungsgruppe::find()->where(['Benuter_MarterikelNr'=>$marterikelNr, 'UebungsgruppeID'=>$gruppe->UebungsgruppeID])->all()!=null){
                $flag = 0;
            }
        }
        return $flag;
    }
}
