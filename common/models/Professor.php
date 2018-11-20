<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "professor".
 *
 * @property int $MarterikelNr
 * @property string $Büro
 *
 * @property ModulLeitetProfessor[] $modulLeitetProfessors
 * @property Modul[] $modul-s
 * @property Benutzer $marterikelNr
 */
class Professor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'professor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MarterikelNr'], 'required'],
            [['MarterikelNr'], 'integer'],
            [['Büro'], 'string', 'max' => 255],
            [['MarterikelNr'], 'unique'],
            [['MarterikelNr'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::className(), 'targetAttribute' => ['MarterikelNr' => 'marterikelnr']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MarterikelNr' => 'Marterikel Nr',
            'Büro' => 'Büro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModulLeitetProfessors()
    {
        return $this->hasMany(ModulLeitetProfessor::className(), ['Professor-MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModuls()
    {
        return $this->hasMany(Modul::className(), ['modul-id' => 'Modul-ID'])->viaTable('modul_leitet_professor', ['Professor-MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarterikelNr()
    {
        return $this->hasOne(Benutzer::className(), ['marterikelnr' => 'MarterikelNr']);
    }
}
