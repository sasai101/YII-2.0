<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "modul_leitet_professor".
 *
 * @property int $Modul-ID
 * @property int $Professor-MarterikelNr
 *
 * @property Modul $modul-
 * @property Professor $professor-MarterikelNr
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
            [['Modul-ID', 'Professor-MarterikelNr'], 'required'],
            [['Modul-ID', 'Professor-MarterikelNr'], 'integer'],
            [['Modul-ID', 'Professor-MarterikelNr'], 'unique', 'targetAttribute' => ['Modul-ID', 'Professor-MarterikelNr']],
            [['Modul-ID'], 'exist', 'skipOnError' => true, 'targetClass' => Modul::className(), 'targetAttribute' => ['Modul-ID' => 'modul-id']],
            [['Professor-MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['Professor-MarterikelNr' => 'marterikelnr']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Modul-ID' => 'Modul  ID',
            'Professor-MarterikelNr' => 'Professor  Marterikel Nr',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModul()
    {
        return $this->hasOne(Modul::className(), ['modul-id' => 'Modul-ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessorMarterikelNr()
    {
        return $this->hasOne(Professor::className(), ['marterikelnr' => 'Professor-MarterikelNr']);
    }
}
