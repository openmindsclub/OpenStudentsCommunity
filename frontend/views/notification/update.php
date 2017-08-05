<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Notification */

$this->title = 'Update Notification: ' . $model->notification_id;
$this->params['breadcrumbs'][] = ['label' => 'Notifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->notification_id, 'url' => ['view', 'id' => $model->notification_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notification-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
