<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Other */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="other-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'other_first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_birth_date')->textInput() ?>

    <?= $form->field($model, 'other_activity')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
