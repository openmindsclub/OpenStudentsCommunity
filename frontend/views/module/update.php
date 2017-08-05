<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Module */

$this->title = 'Update Module: ' . $model->module_id;
$this->params['breadcrumbs'][] = ['label' => 'Modules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->module_id, 'url' => ['view', 'id' => $model->module_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="module-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
