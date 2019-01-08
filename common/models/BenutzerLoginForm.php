<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class BenutzerLoginForm extends Model
{
    public $Benutzername;
    public $password;
    public $rememberMe = true;
    
    private $_user;
    private $_num;
    
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['Benutzername', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }
    
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $benutzer = $this->getUser();
            if (!$benutzer || !$benutzer->validatePassword($this->password)) {
                $this->addError($attribute, 'Flasche Benutzername oder Passwort');
            }
        }
    }
    
    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }
    
    /**
     * Finds user by [[Benutzername]]
     *
     * @return Benutzer|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Benutzer::findByUsername($this->Benutzername);
            // Wenn der gegebener Benutzer wahr ist,
            if(!empty($this->_user)){
                if(!$this->findBenutzer($this->Benutzername)){
                    $this->_user = null;
                }
            }
            
        }
        
        return $this->_user;
    }
    
    /**
     * Finde die MarterikelNr in der Tabelle [[Mitarbeiter],[Professor],[Korretor],[Totur]]
     *
     * @return boolean
     */
    
    public function findBenutzer($Benutzer)
    {
        $benutzer = true;
        
        $model = Benutzer::find()->where(['Benutzername'=>$this->_user])->one();
        
        return $benutzer;
    }
}
