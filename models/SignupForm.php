<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $email;
    public $username;
    public $password;
    public $rememberMe = true;

    const ROLE_USER = 1;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            [['username', 'password', 'email'], 'required'],
            [['password', 'username'], 'string', 'max' => 50],
            [['email'], 'unique', 'targetClass' => User::className()],
            [['username'], 'unique', 'targetClass' => User::className()],
            ['email', 'email'],
            ['rememberMe', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Электронная почта',
            'username' => 'Логин',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня',
        ];
    }


    /**
     * @throws \yii\base\Exception
     */
    public function save(): bool
    {
        if ($this->validate()) {
            $user = new User();
            $user->email = $this->email;
            $user->username = $this->username;
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            $user->created_at = $time = time();
            $user->updated_at = $time;
            $user->is_active = 1;
            $user->role_id = self::ROLE_USER;

            return $user->save();
        }
        return false;
    }
}