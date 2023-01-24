<?php

namespace app\models;

use Yii;
use app\models\Order;
use app\models\Chart;
use app\models\Prod;

class RegForm extends User
{
    public $confirm_password;
    public $agree;
    public function rules()
    {
        return [
            [['name', 'surname', 'login', 'email', 'password', 'confirm_password','agree'], 'required'],
            [['name', 'surname', 'patronymic'], 'match', 'pattern'=>'/^[А-Яа-яЁё\s]{1,}$/u',
                'message'=>'Используйте минимум 1 русские буквы'],
            [['password'], 'match', 'pattern'=>'/^[A-Za-z0-9]{5,}/',
                'message'=>'Используйте минимум 5 латинских букв и цифр'],
            [['email'], 'email'],
            [['is_admin'], 'integer'],
            [['name', 'surname', 'patronymic', 'email'], 'string', 'max' => 100],
            [['login'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 200],
            [['confirm_password'], 'compare', 'compareAttribute'=>'password'],
            [['login'], 'unique'],
            [['email'], 'unique'],
            [['agree'], 'compare', 'compareValue'=>true, 'message'=>''],

        ];
    }
/**
* {@inheritdoc}
*/
    public function attributeLabels()
    {
    return [
    'id_user' => 'Id User',
    'name' => 'Имя',
    'surname' => 'Фамилия',
    'patronymic' => 'Отчество',
    'login' => 'Логин',
    'email' => 'Почта',
    'password' => 'Пароль',
    'confirm_password' => 'Повторите пароль',
    'is_admin' => 'Is Admin',
    'agree' => 'Подтвердите согласие на обработку персональных данных',
        ];
    }
}
