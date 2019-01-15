<?php
namespace frontend\models;

use yii\base\Model;
use common\models\Benutzer;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $Vorname;
    public $Nachname;
    public $Benutzername;
    public $email;
    public $Passwort;
    public $Passwort_widerholung;
    public $MarterikelNr;
    public $Profiefoto;
    public $file;
    


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Vorname','Nachname'],'required'],
            
            ['Benutzername', 'trim'],
            ['Benutzername', 'required'],
            ['Benutzername', 'unique', 'targetClass' => '\common\models\Benutzer', 'message' => 'This username has already been taken.'],
            ['Benutzername', 'string', 'min' => 2, 'max' => 255],
            
            ['MarterikelNr', 'trim'],
            ['MarterikelNr', 'required'],
            ['MarterikelNr', 'unique', 'targetClass' => '\common\models\Benutzer', 'message' => 'This username has already been taken.'],
            ['MarterikelNr', 'integer'],
            ['MarterikelNr', 'checkMarterikelNr'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Benutzer', 'message' => 'This email address has already been taken.'],

            ['Passwort', 'required'],
            ['Passwort', 'string', 'min' => 6],
            // vergleichen die beiden neue gegebene Passwort
            ['Passwort_widerholung','compare','compareAttribute'=>'Passwort','message'=>'Die beiden eingegebene Passworte sind nicht einig!'],
            
            [['file'],'file', 'extensions' => 'jpg','checkExtensionByMimeType'=>false, 'maxSize' => 1024 * 1024 * 2],
        ];
    }
    
    public function checkMarterikelNr($attribute, $params) {
        
        if($this->MarterikelNr>9999999){
            $this->addError($attribute, 'Die MarterikelNr muss 7 stellige sein');
        }else if($this->MarterikelNr<999999){
            $this->addError($attribute, 'Die MarterikelNr muss 7 stellige sein');
        }
    }

    /**
     * Signs user up.
     *
     * @return Benutzer|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new Benutzer();
        $user->Benutzername = $this->Benutzername;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
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
