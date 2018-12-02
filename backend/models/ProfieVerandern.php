<?php
namespace backend\models;

use yii\base\Model;
use common\models\Benutzer;
use Yii;
use yii\helpers\VarDumper;

/**
 * Signup form
 */
class Profieverandern extends Model
{
    public $Vorname ;
    public $Nachname;
    public $email ;
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

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            //['email', 'unique', 'targetClass' => '\common\models\Benutzer', 'message' => 'Diese Email ist von jemanden benutzt.'],

            ['Vorname', 'trim'],
            ['Vorname', 'required'],
            ['Vorname', 'string', 'min' => 2, 'max' => 255],

            ['Nachname', 'trim'],
            ['Nachname', 'required'],
            ['Nachname', 'string', 'min' => 2, 'max' => 255],

        ];
    }
    
    public function attributeLabels() {
        return [
            'Passwort' => 'Passwort',
            'Passwort_widerholung' => 'Wiederholung des Passwortes',
            'Vorname' => 'Vorname',
            'Nachname' => 'Nachname',
            'email' => 'Email',
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
         exit(0);/*
         ==> [ 'Passwort' => [ 0 => 'Passwort darf nicht leer sein.' ] ]
         */
        $benutzer->Passwort = "*";
        $benutzer->Profiefoto = "*";
        $benutzer->setVorname($this->Vorname);
        $benutzer->setNachname($this->Nachname);
        $benutzer->setEmail($this->email);
        return $benutzer->save() ? true : false;
    }
}
