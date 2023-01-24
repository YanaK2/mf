<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Chart $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="chart-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--?= $form->field($model, 'id_user')->textInput() ?-->

    <!--?= $form->field($model, 'id_prod')->textInput() ?-->

    <?= $form->field($model, 'count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save',  ['class' => 'btn btn-success'] ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
