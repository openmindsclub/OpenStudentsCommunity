<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Specialty */

$this->title = 'Create Specialty';
$this->params['breadcrumbs'][] = ['label' => 'Specialties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specialty-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
