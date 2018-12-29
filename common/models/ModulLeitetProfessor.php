<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "modul_leitet_professor".
 *
 * @property int $ModulID
 * @property int $Professor_MarterikelNr
 *
 * @property Modul $modul
 * @property Professor $professorMarterikelNr
 */
class ModulLeitetProfessor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modul_leitet_professor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //sonst wird die Validierung von diesem Tabelle nicht durchgeben
            //[['ModulID', 'Professor_MarterikelNr'], 'required'],
            [['Professor_MarterikelNr'], 'required'],
            [['ModulID', 'Professor_MarterikelNr'], 'integer'],
            [['ModulID', 'Professor_MarterikelNr'], 'unique', 'targetAttribute' => ['ModulID', 'Professor_MarterikelNr']],
            [['ModulID'], 'exist', 'skipOnError' => true, 'targetClass' => Modul::className(), 'targetAttribute' => ['ModulID' => 'ModulID']],
            [['Professor_MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['Professor_MarterikelNr' => 'marterikelnr']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ModulID' => 'Modul ID',
            'Professor_MarterikelNr' => 'Professor',
        ];
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
    public function getProfessorMarterikelNr()
    {
        return $this->hasOne(Professor::className(), ['marterikelnr' => 'Professor_MarterikelNr']);
    }
    
    /*
     * Die Absuchung von der ModelleiteProf für Modul-Update Funktion, Da es beim disem Tabelle eine Compound key gibt
     */
    public static function findModelleitetProf($ModulID, $Professor_MarterikelNr)
    {
        if (($model = ModulLeitetProfessor::findOne(['ModulID' => $ModulID, 'Professor_MarterikelNr' => $Professor_MarterikelNr])) !== null) {
            return $model;
        } 
    }
}
