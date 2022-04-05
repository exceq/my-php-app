<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string|null $phone_number
 * @property string $email
 * @property int $is_active
 * @property int $created_at
 * @property int|null $role_id
 * @property int $updated_at
 *
 * @property Comment[] $comments
 * @property Order[] $orders
 * @property Payment[] $payments
 * @property Role $role
 */

class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    const SCENARIO_USER_REGISTER = 'user_register';
    const SCENARIO_USER_UPDATE = 'user_update';

    public function scenarios()
    {
        return [
            self::SCENARIO_USER_REGISTER => ['email', 'username'],
            self::SCENARIO_USER_UPDATE => ['email', 'username', 'phone_number'],
        ];
    }


    public static function tableName()
    {
        return 'user';
    }

    public static function findByUsername($username): ?User
    {
        return User::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['is_active', 'created_at', 'role_id', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'phone_number', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['phone_number'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'phone_number' => 'Номер телефона',
            'email' => 'Email',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'role_id' => 'Role ID',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function getCurrentUser(): ?User
    {
        return User::findOne(['id'=>Yii::$app->user->id]);
    }


    /**
     * @param $password
     * @return bool
     * @throws \yii\base\Exception
     */
    public function validatePassword($password): bool
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
}
