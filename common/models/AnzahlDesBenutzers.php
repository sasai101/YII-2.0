<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "anzahl_des_benutzers".
 *
 * @property int $id
 * @property string $Datum
 * @property string $Anzahlen
 */
class AnzahlDesBenutzers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anzahl_des_benutzers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Datum', 'Anzahlen'], 'required'],
            [['Datum', 'Anzahlen'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Datum' => 'Datum',
            'Anzahlen' => 'Anzahlen',
        ];
    }
}
