<?php

namespace app\models;


use Yii;

class User extends Account implements \yii\web\IdentityInterface
{
    public $authKey;
    public $accessToken;
//    public $password;
//    private $users;


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return TRUE;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return User::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
//        return Yii::$app->security->validatePassword($password, $this->password);
        return $this->password === md5($password);
    }



//    public function HashPassword($password)
//    {
//        $this->password = \Yii::$app->security->generatePasswordHash($password);
//    }

    public function create()
    {
        return $this->save(false);
    }
}