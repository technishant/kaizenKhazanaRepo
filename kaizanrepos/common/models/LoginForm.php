<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model {

    public $email;
    public $password;
    public $rememberMe = true;
    private $_user;
    public $allowedRoleBackendLogin = array('admin');
    public $allowedRoleFrontendLogin = array('admin', 'user');
    public $loginFrom;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            // username and password are both required
            [['email', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            $role = \Yii::$app->authManager->getRolesByUser($user->id);
            $userRole = array();
            if (!empty($role)) {
                foreach ($role as $key => $value) {
                    array_push($userRole, $key);
                }
            }
            if ($this->loginFrom == 0) {//Login from backend
                if (empty($user)) {
                    $this->addError($attribute, 'User does not exists');
                } else if (empty(array_intersect($userRole, $this->allowedRoleBackendLogin)) && !empty($user)) {
                    $this->addError($attribute, 'Your are not allowed to login.');
                } else if (!$user || !$user->validatePassword($this->password)) {
                    $this->addError($attribute, 'Incorrect username or password.');
                } else {
                    return TRUE;
                }
            } else { // Login from frontend
                if (empty($user)) {
                    $this->addError($attribute, 'User does not exists');
                } else if (empty(array_intersect($userRole, $this->allowedRoleFrontendLogin)) && !empty($user)) {
                    $this->addError($attribute, 'Your are not allowed to login.');
                } else if (!$user || !$user->validatePassword($this->password)) {
                    $this->addError($attribute, 'Incorrect username or password.');
                } else {
                    return TRUE;
                }
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login() {
        if ($this->validate()) {
            $session = \Yii::$app->session;
            if ($session->isActive) {
                $session->destroy();
                $session->open();
                $session->set('email', $this->email);
                $session->set('name', User::findByEmail($this->email)->first_name . "" . User::findByEmail($this->email)->last_name);
            } else {
                $session->open();
                $session->set('email', $this->email);
                $session->set('name', User::findByEmail($this->email)->first_name . "" . User::findByEmail($this->email)->last_name);
            }
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser() {
        if ($this->_user === null) {
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
    }

}
