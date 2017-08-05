<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model frontend\models\Other */

$this->title = $model->other_id;
$this->params['breadcrumbs'][] = ['label' => 'Others', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="other-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->other_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->other_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'other_first_name',
            'other_last_name',
            'other_birth_date',
            'other_activity:ntext',
        ],
    ]) ?>

</div>
