<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prod".
 *
 * @property int $id_prod
 * @property string $photo
 * @property string $name
 * @property int $count
 * @property int $price
 * @property string $country
 * @property int $id_cat
 * @property string $color
 * @property string $time
 *
 * @property Category $cat
 * @property Chart[] $charts
 * @property Order[] $orders
 * @property User[] $users
 */
class Prod extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prod';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['photo', 'name', 'count', 'price', 'country', 'id_cat', 'color'], 'required'],
            [['count', 'price', 'id_cat'], 'integer'],
            [['time'], 'safe'],
            [['photo'], 'file',  'extensions' => ['png', 'jpg', 'gif'],'skipOnEmpty' => false ],
            [['name', 'country', 'color'], 'string', 'max' => 100],
            [['id_cat'], 'unique'],
            [['id_cat'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_cat' => 'id_cat']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_prod' => 'Id Prod',
            'photo' => 'Фото',
            'name' => 'Название',
            'count' => 'Количество на складе',
            'price' => 'Цена',
            'country' => 'Страна',
            'id_cat' => 'Категория',
            'color' => 'Цвет',
            'time' => 'Дата завоза',
        ];
    }

    /**
     * Gets query for [[Cat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Category::class, ['id_cat' => 'id_cat']);
    }

    /**
     * Gets query for [[Charts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCharts()
    {
        return $this->hasMany(Chart::class, ['id_prod' => 'id_prod']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['id_prod' => 'id_prod']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['id_user' => 'id_user'])->viaTable('chart', ['id_prod' => 'id_prod']);
    }
}
