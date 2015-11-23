<?php

namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model {

    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $address;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['first_name', 'last_name', 'email','password'], 'filter', 'filter' => 'trim'],
            [['first_name', 'last_name', 'phone', 'email','password'], 'required'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email has already been taken.'],
            ['first_name', 'string', 'min' => 2, 'max' => 255],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {
        if ($this->validate()) {
            $user = new User();
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->phone = $this->phone;
            $user->address = $this->address;
            $user->email = $this->email;
            $user->generateAuthKey();
            $user->setPassword($this->password);
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

}
