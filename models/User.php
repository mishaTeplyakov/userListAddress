<?php

namespace app\models;

use function Sodium\add;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $name
 * @property string $surname
 * @property int $sex
 * @property string $date
 * @property string $email
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{

    const SEX_MALE = 1;
    const SEX_FEMALE = 2;
    const SEX_NULL = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password', 'name', 'surname', 'email'], 'required'],
            [['login'],'string','min'=>4],
            [['password'],'string','min'=>6],
            ['name','match','pattern' => '/^[A-Z]{1}[a-z]/'],
            ['surname','match','pattern' =>'/^[A-Z]{1}[a-z]/'],
            [['login', 'password', 'name', 'surname', 'email'], 'string', 'max' => 255],
            [['email'], 'unique'],
            ['sex', 'in', 'range' => [self::SEX_MALE, self::SEX_FEMALE,self::SEX_NULL]]
        ];
    }

    public function saveAddress($id){

        $address = Address::findOne($id);
        if($address != null){
            $this->link('address',$address);
            return true;
        }
        $this->link('address',$address);
    }

    public function validatePassword($password)
    {
        return ($this->password == $password) ? true : false;
    }

    public function getPhoto($sex)
    {
        return ($sex == self::SEX_MALE) ? '/image/male.png' : '/image/female.png';
    }

    public static function getSexArray()
    {
        return[
            self::SEX_MALE =>'Муж.',
            self::SEX_FEMALE =>'Жен.',
            self::SEX_NULL =>'null',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'sex' => 'Пол',
            'date' => 'Дата',
            'email' => 'Email',
        ];
    }

    public static function findByLogin($login){
        return User::find()->where(['login'=>$login])->one();
    }

    public function getDate(){
        //Yii::$app->formatter->locale = 'ru-RU';
        return Yii::$app->formatter->asDate($this->date);
    }


    public function getAddress(){
       return $this->hasMany(Address::className(),['user_id'=>'id']);
    }

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
}
