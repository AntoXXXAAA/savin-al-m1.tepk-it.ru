<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm - модель для формы входа.
 *
 * @property-read User|null $user
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    /**
     * @return array правила валидации.
     */
    public function rules()
    {
        return [
            // логин и пароль обязательны
            [['username', 'password'], 'required', 'message' => 'Поле обязательно для заполнения'],
            // rememberMe должен быть булевым значением
            ['rememberMe', 'boolean'],
            // пароль проверяется validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Проверяет пароль.
     * Этот метод служит встроенной проверкой для пароля.
     *
     * @param string $attribute проверяемый атрибут
     * @param array $params дополнительные пары имя-значение
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неверный логин или пароль.');
            }
        }
    }

    /**
     * Выполняет вход пользователя.
     * @return bool успешность входа
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Находит пользователя по [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}