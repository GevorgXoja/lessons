<?php
namespace app\models;
use yii\base\Model;

class RegisterForm extends Model{

    public $username;
    public $password;
    public $rememberMe;
    public $password_repeate;

    public function rules() {
        return [
            [['username', 'password', 'password_repeate'], 'required', 'message' => 'Заполните поле'],
            ['password', 'string', 'min' => 6],
            ['password_repeate', 'string', 'min' => 6],
            ['password_repeate', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function register() {
        if(!$this->validate()){
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->HashPassword($this->password);

        return $user->save() ? $user : null;
    }

}