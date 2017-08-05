<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Other */

$this->title = 'Update Other: ' . $model->other_id;
$this->params['breadcrumbs'][] = ['label' => 'Others', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->other_id, 'url' => ['view', 'id' => $model->other_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="other-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
