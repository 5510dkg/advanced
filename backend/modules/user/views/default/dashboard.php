<?php
$this->title='Home';

?>
<?php
use yii\helpers\Html;

?> 
<?php  if(Yii::$app->user->can('generate-labels')){ ?>
<div class="col-lg-4">
                        <?=Html::a('Railway Labels',['/circulation/railway-post-data'],['class'=>'btn btn-success btn-lg btn-block'])?> 
                </div> 
<?php } ?>
<?php  if(Yii::$app->user->can('generate-labels')){ ?>
<div class="col-lg-4">
                        <?=Html::a('Ordinary Post Labels',['/circulation/ordinary-post-data'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        
                </div> 
<?php } ?>
<?php  if(Yii::$app->user->can('generate-labels')){ ?>
<div class="col-lg-4">
                        <?=Html::a('Registered Post Labels',['/circulation/registered-post-data'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        
                </div> 
<?php } ?>
<br/><br/><br/>