<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Publication */

$this->title = 'Update Publication: ' . $model->publication_id;
$this->params['breadcrumbs'][] = ['label' => 'Publications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->publication_id, 'url' => ['view', 'id' => $model->publication_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="publication-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
