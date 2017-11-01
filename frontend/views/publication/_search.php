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

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_module') ?>

    <?= $form->field($model, 'tag_name') ?>

    <?= $form->field($model, 'publication_name') ?>

    <?php // echo $form->field($model, 'publication_content') ?>

    <?php // echo $form->field($model, 'publicaiton_path') ?>

    <?php // echo $form->field($model, 'publication_time') ?>

    <?php // echo $form->field($model, 'publication_publisher') ?>

    <?php // echo $form->field($model, 'publication_date') ?>

    <?php // echo $form->field($model, 'publication_place') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
