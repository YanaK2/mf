<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Chart $model */

$this->title = $model->id_chart;
$this->params['breadcrumbs'][] = ['label' => 'Charts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="chart-view">
    <script src="/web/js/addprod.js"></script>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_chart' => $model->id_chart], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_chart' => $model->id_chart], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_chart',
            'id_user',
            'id_prod',
            'count',
        ],
    ]) ?>

</div>
