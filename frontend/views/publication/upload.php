<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo \kato\DropZone::widget([
       'options' => [

       	   'url' => 'index.php?r=publication/upload',
           'maxFilesize' => '20',
       ],
       'clientEvents' => [
           'complete' => "function(file){console.log(file)}",
           'removedfile' => "function(file){alert(file.name + ' is removed')}"
       ],
   ]);
?>

 <div class="form-group">
        <?= Html::a( 'finish loading files', ['/publication/index'], ['class'=>'btn btn-primary']) ?>
    </div>