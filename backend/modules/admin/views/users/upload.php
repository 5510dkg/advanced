<?php
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title="Upload Multiple Users";


 ?>
 <?php echo FileInput::widget([
   'name'=>'file[]',
   'options'=>[
     'multiple'=>true
   ],
   'pluginOptions'=>[
     'uploadUrl'=>URL::to(['users/uploadusers']),
     'maxFileCount'=>1,

 ],
  'options' => ['accept' => './xlxs']
   ]) ?>
   <div class="col-sm-4 offset-4">
<?=Html::a("Click here",['/admin/users/download']) ?> to download excel format.

   </div>
