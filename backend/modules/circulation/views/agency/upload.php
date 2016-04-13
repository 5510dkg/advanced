<?php
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title="Upload Multiple Agencies";
$this->params['breadcrumbs'][] = $this->title;
?>
 <?php echo FileInput::widget([
   'name'=>'file[]',
   'options'=>[
     'multiple'=>true
   ],
   'pluginOptions'=>[
     'uploadUrl'=>URL::to(['agency/uploadagency']),
     'maxFileCount'=>1,

 ],
  'options' => ['accept' => './xlxs']
   ]) ?>
   <div class="col-sm-4 offset-4">
<?=Html::a("Click here",['/circulation/agency/download']) ?> to download excel format.

   </div>
