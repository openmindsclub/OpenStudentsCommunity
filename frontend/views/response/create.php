<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Response */

$this->title = 'Create Response';
$this->params['breadcrumbs'][] = ['label' => 'Responses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="response-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
