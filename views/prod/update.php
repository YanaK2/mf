<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Prod $model */

$this->title = 'Update Prod: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Prods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id_prod' => $model->id_prod]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prod-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
