<?php
namespace frontend\models;

use yii\base\Model;
use yii\helpers\VarDumper;
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
    


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Vorname','Nachname'],'required'],
            
            ['Benutzername', 'trim'],
            ['Benutzername', 'required'],
            ['Benutzername', 'unique', 'targetClass' => '\common\models\Benutzer', 'message' => 'Dieser Benutzername ist schon exisitiert.'],
            ['Benutzername', 'string', 'min' => 2, 'max' => 255],
            
            ['MarterikelNr', 'trim'],
            ['MarterikelNr', 'required'],
            ['MarterikelNr', 'unique', 'targetClass' => '\common\models\Benutzer', 'message' => 'Dieser MarterikelNr ist schon exisitiert.'],
            ['MarterikelNr', 'integer'],
            ['MarterikelNr', 'checkMarterikelNr'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Benutzer', 'message' => 'Dieser Email ist schon exisitiert.'],

            ['Passwort', 'required'],
            ['Passwort', 'string', 'min' => 6],
            // vergleichen die beiden neue gegebene Passwort
            ['Passwort_widerholung','compare','compareAttribute'=>'Passwort','message'=>'Die beiden eingegebene Passworte sind nicht einig!'],
        ];
    }
    
    public function checkMarterikelNr($attribute, $params) {
        
        if($this->MarterikelNr>9999999){
            $this->addError($attribute, 'Die MarterikelNr muss 7 stellige sein');
        }else if($this->MarterikelNr<999999){
            $this->addError($attribute, 'Die MarterikelNr muss 7 stellige sein');
        }
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
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new Benutzer;
        $user->MarterikelNr = $this->MarterikelNr;
        $user->Benutzername = $this->Benutzername;
        $user->email = $this->email;
        $user->Vorname = $this->Vorname;
        $user->Nachname = $this->Nachname;
        $user->setPassword($this->Passwort);
        $user->generateAuthKey();
        $user->Passwort = "*";
        $user->created_at = time();
        $user->updated_at = time();
        $user->Profiefoto = "../../profiefoto/normal.jpg";
        //$user->save();
        //VarDumper::dump($user->errors);
        //exit(0);
        
        return $user->save() ? $user : null;
    }    
}
