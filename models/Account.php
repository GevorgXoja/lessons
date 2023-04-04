<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account".
 *
 * @property int id
 */
class Account extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'auth_key', 'access_token', 'role', 'status'], 'required'],
            [['status'], 'integer'],
            [['username', 'password'], 'string', 'max' => 255],
            [['auth_key', 'access_token'], 'string', 'max' => 100],
            [['role'], 'string', 'max' => 60],
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
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'role' => 'Role',
            'status' => 'Status',
        ];
    }
}
