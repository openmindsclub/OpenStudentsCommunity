<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Response */

$this->title = 'Update Response: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Responses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="response-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
