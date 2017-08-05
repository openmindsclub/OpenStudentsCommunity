<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\OtherSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="other-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'other_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'other_first_name') ?>

    <?= $form->field($model, 'other_last_name') ?>

    <?= $form->field($model, 'other_birth_date') ?>

    <?php // echo $form->field($model, 'other_activity') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
