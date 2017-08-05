<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Publication */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publication-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'module_id')->textInput() ?>

    <?= $form->field($model, 'tag_id')->textInput() ?>

    <?= $form->field($model, 'publication_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publication_text_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'publication_directory')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publication_creation_time')->textInput() ?>

    <?= $form->field($model, 'publication_place')->textInput() ?>

    <?= $form->field($model, 'publication_date')->textInput() ?>

    <?= $form->field($model, 'publication_rate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
