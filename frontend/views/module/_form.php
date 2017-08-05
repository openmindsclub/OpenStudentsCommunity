<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Specialty;
use frontend\models\Domain;


/* @var $this yii\web\View */
/* @var $model frontend\models\Module */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="module-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'domain')->dropDownList(
					ArrayHelper::map(Domain::find()->all(),'domain_id','domain_name'),
								['prompt'=>'Select a domain',
                                    'onchange'=>'
                                    $.post( "index.php?r=specialty/lists&id='.'"+$(this).val(),function( data ) {
                                      $( "select#module-specialty_id" ).html( data );
                                    });'

								]); ?>   

    <?= $form->field($model, 'specialty_id')->dropDownList(
    				ArrayHelper::map(Specialty::find()->all(),'specialty_id','specialty_name')
    							); ?>

    <?= $form->field($model, 'module_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'module_description')->textarea(['rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
