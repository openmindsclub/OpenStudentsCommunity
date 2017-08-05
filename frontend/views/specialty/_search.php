<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SpecialtySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="specialty-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'specialty_id') ?>

    <?= $form->field($model, 'domain_id') ?>

    <?= $form->field($model, 'specialiity_name') ?>

    <?= $form->field($model, 'specialty_description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
