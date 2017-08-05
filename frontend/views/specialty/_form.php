<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Domain;

/* @var $this yii\web\View */
/* @var $model frontend\models\Specialty */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="specialty-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'domain_id')->dropDownList(
                                 ArrayHelper::map(Domain::find()->all(),'domain_id','domain_name')
                                ); ?>

    <?= $form->field($model, 'specialty_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'specialty_description')->textarea(['rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
