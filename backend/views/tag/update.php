<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tag */

$this->title = 'Update Tag: ' . $model->tag_name;
$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tag_name, 'url' => ['view', 'id' => $model->tag_name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
