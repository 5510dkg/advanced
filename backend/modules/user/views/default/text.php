
<?php  if(Yii::$app->user->can('generate-labels')){ ?>
<div class="col-lg-4">
                        <?=Html::a('Single Railway Label',['/circulation/railway-post-data/searchview'],['class'=>'btn btn-success btn-lg btn-block'])?> 
                </div> 
<?php } ?>
<?php  if(Yii::$app->user->can('generate-labels')){ ?>
<div class="col-lg-4">
                        <?=Html::a('Single Ordinary Post Label',['/circulation/ordinary-post-data/searchview'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        
                </div> 
<?php } ?>
<?php  if(Yii::$app->user->can('generate-labels')){ ?>
<div class="col-lg-4">
                        <?=Html::a('Single Registered Post Label',['/circulation/registered-post-data/searchview'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        
                </div> 
<?php } ?>