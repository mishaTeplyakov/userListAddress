<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property string $post_index
 * @property string $country
 * @property string $city
 * @property string $street
 * @property int $num_home
 * @property int $num_office
 * @property int $user_id
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_index', 'country', 'city', 'street', 'num_home'], 'required'],
            ['country','match','pattern' => '/^[A-Z]{2}/'],
            [['num_home', 'num_office', 'user_id'], 'integer'],
            [['post_index', 'country', 'city', 'street'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_index' => 'Post Index',
            'country' => 'Country',
            'city' => 'City',
            'street' => 'Street',
            'num_home' => 'Num Home',
            'num_office' => 'Num Office',
            'user_id' => 'User ID',
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'id']);
    }
}
