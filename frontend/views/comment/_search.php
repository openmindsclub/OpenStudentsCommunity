<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CommentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'comment_text_content') ?>

    <?= $form->field($model, 'comment_file_path') ?>

    <?php // echo $form->field($model, 'comment_creation_time') ?>

    <?php // echo $form->field($model, 'comment_rate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
