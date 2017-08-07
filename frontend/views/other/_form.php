<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\Helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Other */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="other-form">

    <?php $form = ActiveForm::begin(['enableAjaxValidation'=>true]); ?>


    <?= $form->field($model, 'other_first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_birth_date')->widget(
    DatePicker::className(), [
         'inline' => false, 
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
            ]]); ?>

    <?= $form->field($model, 'other_activity')->textarea(['rows' => 1]) ?>



          <!-- adding fields related to user -->

    <?= $form->field($user, 'username')->textInput() ?>

    <?= $form->field($user, 'email') ?>

    <?= $form->field($user, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
