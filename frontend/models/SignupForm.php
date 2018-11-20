<?php
namespace frontend\models;

use yii\base\Model;
use common\models\Benutzer;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $Benutzername;
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['Benutzername', 'trim'],
            ['Benutzername', 'required'],
            ['Benutzername', 'unique', 'targetClass' => '\common\models\Benutzer', 'message' => 'This username has already been taken.'],
            ['Benutzername', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Benutzer', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
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
        
        $user = new Benutzer();
        $user->Benutzername = $this->Benutzername;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
