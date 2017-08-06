<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Specialty */

$this->title = 'Update Specialty: ' . $model->specialty_id;
$this->params['breadcrumbs'][] = ['label' => 'Specialties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->specialty_id, 'url' => ['view', 'id' => $model->specialty_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="specialty-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
