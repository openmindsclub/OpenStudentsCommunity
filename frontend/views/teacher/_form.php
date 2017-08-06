<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\Helpers\ArrayHelper;
use frontend\models\School;
use frontend\models\Domain;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Teacher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'teacher_first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'teacher_last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'teacher_birth_date')->widget(
    DatePicker::className(), [
         'inline' => false, 
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
            ]]); ?>

    <?= $form->field($model, 'school_id')->dropDownList(
                   ArrayHelper::map(School::find()->all(),'school_id','school_name')
                        ); ?>

    <?= $form->field($model, 'domain_id')->dropDownList(
                   ArrayHelper::map(Domain::find()->all(),'domain_id','domain_name')
                        ); ?>




            <!-- adding fields related to user -->

    <?= $form->field($user, 'username')->textInput() ?>

    <?= $form->field($user, 'email') ?>

    <?= $form->field($user, 'password')->passwordInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
