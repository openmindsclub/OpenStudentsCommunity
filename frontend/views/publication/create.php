<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Publication */

$this->title = 'Create Publication';
$this->params['breadcrumbs'][] = ['label' => 'Publications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publication-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
