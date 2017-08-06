<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ReportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'report_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'publication_id') ?>

    <?= $form->field($model, 'comment_id') ?>

    <?= $form->field($model, 'reportedUser_id') ?>

    <?php // echo $form->field($model, 'report_content') ?>

    <?php // echo $form->field($model, 'report_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
