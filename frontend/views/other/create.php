<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Other */

$this->title = 'Create Other';
$this->params['breadcrumbs'][] = ['label' => 'Others', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="other-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
    ]) ?>

</div>
