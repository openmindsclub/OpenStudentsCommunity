<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Report */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'publication_id')->textInput() ?>

    <?= $form->field($model, 'comment_id')->textInput() ?>

    <?= $form->field($model, 'reportedUser_id')->textInput() ?>

    <?= $form->field($model, 'report_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'report_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
