<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Domain */

$this->title = 'Update Domain: ' . $model->domain_id;
$this->params['breadcrumbs'][] = ['label' => 'Domains', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->domain_id, 'url' => ['view', 'id' => $model->domain_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="domain-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
