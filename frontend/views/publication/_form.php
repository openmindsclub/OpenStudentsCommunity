<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\Helpers\ArrayHelper;
use frontend\models\School;
use frontend\models\Domain;
use frontend\models\Specialty;
use frontend\models\Module;
use frontend\models\Tag;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model frontend\models\Publication */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publication-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'domain')->dropDownList(
                               ArrayHelper::map(Domain::find()->all(),'domain_id','domain_name'),
                                    ['prompt'=>'Select a domain',
                                    'onchange'=>'
                                    $.post( "index.php?r=specialty/lists&id='.'"+$(this).val(),function( data ) {
                                      $( "select#publication-specialty" ).html( data );
                                    });'
    
                            ]); ?>

    <?= $form->field($model, 'specialty')->dropDownList(
                        ArrayHelper::map(Specialty::find()->all(), 'specialty_id', 'specialty_name'),
                        ['prompt'=>'Select a specialty',
                        'onchange'=>'
                                    $.post( "index.php?r=module/lists&id='.'"+$(this).val(),function( data ) {
                                      $( "select#publication-module_id" ).html( data );
                                    });'
                        ]); ?> 




    <?= $form->field($model,'module_id')->dropDownList(
                        ArrayHelper::map(Module::find()->all(), 'module_id','module_name'),
                        ['prompt'=> 'select a module']);?>

    <?= $form->field($model, 'tag_id')->dropDownList(
                   ArrayHelper::map(Tag::find()->all(),'tag_id','tag_name')
                        ); ?>

    <?= $form->field($model, 'publication_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publication_text_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'publication_directory')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'publication_place')->dropDownList(
                   ArrayHelper::map(School::find()->all(),'school_id','school_name')
                        ); ?>

    <?= $form->field($model, 'publication_date')->widget(
    DatePicker::className(), [
         'inline' => false, 
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
            ]]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
