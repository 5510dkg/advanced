<?php
$this->title='Home';
$this->registerJsFile('@web/bower_components/jquery/dist/jquery.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/bower_components/bootstrap/dist/js/bootstrap.min.js', ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);

?>
<?php
use yii\helpers\Html;

?> 
<?php  if(Yii::$app->user->can('add-license')){ ?>
<div class="col-lg-4">
                        <?=Html::a('license management',['/settings/license'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                </div> 
<?php } ?>
<?php if(Yii::$app->user->can('add-bundle-size')) {?>
<div class="col-lg-4">
                            <?=Html::a('Bundle Size',['/settings/bundle-size'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        
                </div>
<?php } ?>
<?php if(Yii::$app->user->can('add-country')) {?>
<div class="col-lg-4">
                            <?=Html::a('Country',['/settings/country'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        
                </div>
<?php } ?>
<br/><br/><br/>
<?php if(Yii::$app->user->can('add-delivery-method')) {?>
<div class="col-lg-4">
                            <?=Html::a('Delivery methods',['/settings/delivery-methods'],['class'=>'btn btn-success btn-lg btn-block'])?> 
                </div>
<?php } ?>
<?php if(Yii::$app->user->can('add-department')) {?>
<div class="col-lg-4">
                            <?=Html::a('Department',['/settings/department'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                </div>
<?php } ?>
<?php if(Yii::$app->user->can('add-designation')) {?>
<div class="col-lg-4">
                            <?=Html::a('Designation',['/settings/designation'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                </div>
<?php } ?>
<br/><br/><br/>
<?php if(Yii::$app->user->can('add-district')) {?>
<div class="col-lg-4">
                            <?=Html::a('District',['/settings/license'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        
                </div>
<?php } ?>

<?php if(Yii::$app->user->can('add-payment-mode')) {?>
<div class="col-lg-4">
                            <?=Html::a('Payment Mode',['/settings/payment-mode'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                </div>
<?php } ?>

<?php if(Yii::$app->user->can('add-postage-rate')) {?>
<div class="col-lg-4">
                            <?=Html::a('Postage Rate',['/settings/postage-rate'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                </div>
<?php } ?>
<br/><br/><br/>
<?php if(Yii::$app->user->can('add-state')) {?>
<div class="col-lg-4">
                            <?=Html::a('State',['/settings/state'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                </div>
<?php } ?>
<?php if(Yii::$app->user->can('add-sub-department')) {?>
<div class="col-lg-4">
                            <?=Html::a('State',['/settings/sub-department'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                </div>
<?php } ?>
