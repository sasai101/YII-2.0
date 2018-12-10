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
            //[['ModulID', 'Professor_MarterikelNr'], 'required'],
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
            'Professor_MarterikelNr' => 'Professor  Marterikel Nr',
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
}
