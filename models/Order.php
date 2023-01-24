<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id_order
 * @property int $id_chart
 * @property int $id_user
 * @property int $id_prod
 * @property int $count
 * @property string $time
 * @property string $status
 * @property string|null $reason
 *
 * @property Chart $chart
 * @property Prod $prod
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_chart', 'id_user', 'id_prod', 'count'], 'required'],
            [['id_chart', 'id_user', 'id_prod', 'count'], 'integer'],
            [['time'], 'safe'],
            [['status'], 'string'],
            [['reason'], 'string', 'max' => 250],
            [['id_chart', 'id_user', 'id_prod', 'count'], 'unique', 'targetAttribute' => ['id_chart', 'id_user', 'id_prod', 'count']],
            [['id_prod'], 'exist', 'skipOnError' => true, 'targetClass' => Prod::class, 'targetAttribute' => ['id_prod' => 'id_prod']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id_user']],
            [['id_chart'], 'exist', 'skipOnError' => true, 'targetClass' => Chart::class, 'targetAttribute' => ['id_chart' => 'id_chart']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id_order' => 'Id Order',
            //'id_chart' => 'Id Chart',
            //'id_user' => 'Id User',
            'id_prod' => 'Продукт',
            'count' => 'Количество',
            'time' => 'Время добавления',
            'status' => 'Статус',
            'reason' => 'Причина',
        ];
    }

    /**
     * Gets query for [[Chart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChart()
    {
        return $this->hasOne(Chart::class, ['id_chart' => 'id_chart']);
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
