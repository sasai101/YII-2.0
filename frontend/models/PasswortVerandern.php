<?php
namespace frontend\models;

use yii\base\Model;
use common\models\Benutzer;
use yii\helpers\VarDumper;

/**
 * Signup form
 */
class PasswortVerandern extends Model
{
    public $Passwort;
    public $Passwort_widerholung;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['Passwort', 'required'],
            ['Passwort', 'string', 'min' => 6],
            // vergleichen die beiden neue gegebene Passwort
            ['Passwort_widerholung','compare','compareAttribute'=>'Passwort','message'=>'Die beiden eingegebene Passworte sind nicht einig!'],
        ];
    }

    public function attributeLabels() {
        return [
            'Passwort' => 'Passwort',
            'Passwort_widerholung' => 'Wiederholung des Passwortes',
        ];
    }
    
    /**
     * Signs user up.
     *
     * @return Benutzer|null the saved model or null if saving fails
     */
    public function passwortZurucksetzen($id)
    {
        if (!$this->validate()) {
            return null;
        }
        
        $benutzer = Benutzer::findOne($id);
        $benutzer->setPassword($this->Passwort);
        $benutzer->removePasswordResetToken();
        /*
        $benutzer->save();
        VarDumper::dump($benutzer->errors);
        exit(0);
        ==> [ 'Passwort' => [ 0 => 'Passwort darf nicht leer sein.' ] ]
        */
        $benutzer->Passwort = "*";
        //$benutzer->Profiefoto = "**";
        return $benutzer->save() ? true : false;
    }
}
