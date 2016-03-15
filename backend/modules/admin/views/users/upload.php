<?php
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title="Upload Multiple Users";


 ?>

<div class="row">
    <div class="page-header">
        <h1>Upload Multiple Users</h1>
    </div>
</div>
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
