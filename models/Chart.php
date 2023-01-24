<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chart".
 *
 * @property int $id_chart
 * @property int $id_user
 * @property int $id_prod
 * @property int $count колво товара
 *
 * @property Order[] $orders
 * @property Prod $prod
 * @property User $user
 */
class Chart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_prod', 'count'], 'required'],
            [['id_user', 'id_prod', 'count'], 'integer'],
            [['id_user', 'id_prod'], 'unique', 'targetAttribute' => ['id_user', 'id_prod']],
            [['id_prod'], 'exist', 'skipOnError' => true, 'targetClass' => Prod::class, 'targetAttribute' => ['id_prod' => 'id_prod']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_chart' => 'Id Chart',
            'id_user' => 'Пользователь',
            'id_prod' => 'Продукт',
            'count' => 'Количество',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['id_chart' => 'id_chart']);
    }

    /**
     * Gets query for [[Prod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProd()
    {
        return $this->hasOne(Prod::class, ['id_prod' => 'id_prod']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id_user' => 'id_user']);
    }
}
