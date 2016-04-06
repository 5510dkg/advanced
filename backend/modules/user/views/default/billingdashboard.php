<?php
$this->title='Billing Home';

?>
<?php
use yii\helpers\Html;

?> 
<?php  if(Yii::$app->user->can('generate-bill')){ ?>
<div class="col-lg-4">
                   
                        <?=Html::a('Generate Bill',['/circulation/billing'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        
                </div> 
<?php } ?>

<?php  if(Yii::$app->user->can('upload-credit-note')){ ?>
<div class="col-lg-4">
                        <?=Html::a('Credit Note',['/circulation/agency-credit-note/searchview'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        
                </div> 
<?php } ?>

<?php  if(Yii::$app->user->can('upload-receipt')){ ?>
<div class="col-lg-4">
                        <?=Html::a('Agency Receipts',['/circulation/agency-receipt/list'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        
                </div> 
<?php } ?>
<br/>
<br/>
<br/>

<?php  if(Yii::$app->user->can('search-bill')){ ?>
<div class="col-lg-4">
                        <?=Html::a('Search Bill',['/circulation/billing/search'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        
                </div> 
<?php } ?>