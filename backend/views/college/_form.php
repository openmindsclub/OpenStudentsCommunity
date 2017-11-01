<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\College */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="college-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'college_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'college_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'college_website')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
