<?php


namespace app\models;


use yii\base\Model;
use app\models\User;

class SignUpForm extends Model {
    public $name;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'email']
        ];
    }

    public function register(){
        if($this->validate()){
            $user = new User();
            $user->attributes = $this->attributes;
            return $user->create();
        }
    }
}