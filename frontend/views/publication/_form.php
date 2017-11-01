<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Publication */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publication-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'id_module')->textInput() ?>

    <?= $form->field($model, 'tag_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publication_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publication_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'publicaiton_path')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'publication_time')->textInput() ?>

    <?= $form->field($model, 'publication_publisher')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publication_date')->textInput() ?>

    <?= $form->field($model, 'publication_place')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
