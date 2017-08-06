<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\Helpers\ArrayHelper;
use frontend\models\School;
use dosamigos\datepicker\DatePicker;



/* @var $this yii\web\View */
/* @var $model frontend\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

   

    <?= $form->field($model, 'student_fisrt_name')->textInput(['maxlength' => true],['autofocus' => true]) ?>

    <?= $form->field($model, 'student_last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'student_birth_date')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
            ]
            ]);?>

     <?= $form->field($model, 'school_id')->dropDownList(
                        ArrayHelper::map(School::find()->all(),'school_id','school_name')
                        ); ?>


            <!-- Adding the informations related to user -->



    <?= $form->field($user, 'username')->textInput() ?>

    <?= $form->field($user, 'email') ?>

    <?= $form->field($user, 'password')->passwordInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
