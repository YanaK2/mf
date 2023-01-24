<?php

use app\models\Prod;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProdSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Prods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prod-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Prod', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_prod',
            'photo',
            'name',
            'count',
            'price',
            //'country',
            //'id_cat',
            //'color',
            //'time',
            ['attribute'=>'Категория', 'value'=> function($data){return
                $data->getCat()->One()->cat;}],
            'name',
            ['attribute'=>'Фото', 'format'=>'html',
                'value'=>function($data){return"<img src='{$data->photo}' alt='photo' style='width: 70px;'>";}],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Prod $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_prod' => $model->id_prod]);
                 }
            ],
        ],
    ]); ?>


</div>
