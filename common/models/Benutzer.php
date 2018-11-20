<?php

namespace common\models;

use Yii;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "benutzer".
 *
 * @property int $MarterikelNr
 * @property string $Benutzername
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $Vorname
 * @property string $Nachname
 * @property int $created_at
 * @property int $updated_at
 * 
 * @property Abgabe[] $abgabes 
 * @property BenutzerAnmeldenKlausur[] $benutzerAnmeldenKlausurs 
 * @property Klausur[] $klausur-s 
 * @property BenutzerTeilnimmtübungsgruppe[] $benutzerTeilnimmtübungsgruppes 
 * @property übungsgruppe[] $Übungsgruppe-s 
 * @property Klausurnote[] $klausurnotes 
 * @property Korrektor $korrektor 
 * @property Mitarbeiter $mitarbeiter 
 * @property ModulAnmeldenBenutzer[] $modulAnmeldenBenutzers 
 * @property Modul[] $modul-s 
 * @property Professor $professor 
 * @property Tutor $tutor 
 */
class Benutzer extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'benutzer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Benutzername', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['MarterikelNr','created_at', 'updated_at'], 'integer'],
            //[['Benutzername', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['email', 'password_hash', 'password_reset_token', 'Vorname', 'Nachname', 'Benutzername'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            
            [['Benutzername'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['MarterikelNr'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MarterikelNr' => 'MarterikelNr',
            'Benutzername' => 'Benutzername',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'Vorname' => 'Vorname',
            'Nachname' => 'Nachname',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public static function findIdentity($MarterikelNr)
    {
        return static::findOne(['MarterikelNr' => $MarterikelNr]);
    }
    
    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    
    /**
     * Finds user by username
     *
     * @param string $Benutzername
     * @return static|null
     */
    public static function findByUsername($Benutzername)
    {
        return static::findOne(['Benutzername' => $Benutzername]);
    }
    
    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }
        
        return static::findOne([
            'password_reset_token' => $token
        ]);
    }
    
    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        
        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['benutzer.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }
    
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    
    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    
    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    
    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbgabes()
    {
        return $this->hasMany(Abgabe::className(), ['Benutzer-MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzerAnmeldenKlausurs()
    {
        return $this->hasMany(BenutzerAnmeldenKlausur::className(), ['Benutzer-MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKlausur()
    {
        return $this->hasMany(Klausur::className(), ['klausur-id' => 'Klausur-ID'])->viaTable('benutzer_anmelden_klausur', ['Benutzer-MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzerTeilnimmtUebungsgruppes()
    {
        return $this->hasMany(BenutzerTeilnimmtUebungsgruppe::className(), ['Benuter-MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getÜbungsgruppe()
    {
        return $this->hasMany(Uebungsgruppe::className(), ['übungsgruppe-id' => 'Übungsgruppe-ID'])->viaTable('benutzer_teilnimmt_uebungsgruppe', ['Benuter-MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKlausurnotes()
    {
        return $this->hasMany(Klausurnote::className(), ['Benutzer-MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKorrektor()
    {
        return $this->hasOne(Korrektor::className(), ['MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMitarbeiter()
    {
        return $this->hasOne(Mitarbeiter::className(), ['MarterikelNr' => 'marterikelnr']);
    }
 
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModulAnmeldenBenutzers()
    {
        return $this->hasMany(ModulAnmeldenBenutzer::className(), ['Benutzer-MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModul()
    {
        return $this->hasMany(Modul::className(), ['modul-id' => 'Modul-ID'])->viaTable('modul_anmelden_benutzer', ['Benutzer-MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(Professor::className(), ['MarterikelNr' => 'marterikelnr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTutor()
    {
        return $this->hasOne(Tutor::className(), ['MarterikelNr' => 'marterikelnr']);
    }
}