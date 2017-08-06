<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PublicationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publication-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'publication_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'module_id') ?>

    <?= $form->field($model, 'tag_id') ?>

    <?= $form->field($model, 'publication_name') ?>

    <?php // echo $form->field($model, 'publication_text_content') ?>

    <?php // echo $form->field($model, 'publication_directory') ?>

    <?php // echo $form->field($model, 'publication_creation_time') ?>

    <?php // echo $form->field($model, 'publication_place') ?>

    <?php // echo $form->field($model, 'publication_date') ?>

    <?php // echo $form->field($model, 'publication_rate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
