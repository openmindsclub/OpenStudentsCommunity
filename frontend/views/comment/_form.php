<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'publication_id')->textInput() ?>

    <?= $form->field($model, 'comment_text_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'comment_file_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment_creation_time')->textInput() ?>

    <?= $form->field($model, 'comment_rate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
