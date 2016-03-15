<?php
use yii\helpers\Html;

?> 
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Configuration</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<?php  if(Yii::$app->user->can('add-license')){ ?>
<div class="col-lg-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            License Management
                        </div>
                        <div class="panel-body">
                        <?=Html::a('license management',['/settings/license'],['class'=>'btn btn-success btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                           License Management
                        </div>
                    </div>
                </div> 
<?php } ?>
<?php if(Yii::$app->user->can('add-bundle-size')) {?>
<div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Primary Panel
                        </div>
                        <div class="panel-body">
                            <?=Html::a('Bundle Size',['/settings/bundle-size'],['class'=>'btn btn-primary btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                            Panel Footer
                        </div>
                    </div>
                </div>
<?php } ?>
<?php if(Yii::$app->user->can('add-country')) {?>
<div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Primary Panel
                        </div>
                        <div class="panel-body">
                            <?=Html::a('Country',['/settings/country'],['class'=>'btn btn-primary btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                            Panel Footer
                        </div>
                    </div>
                </div>
<?php } ?>
<?php if(Yii::$app->user->can('add-delivery-method')) {?>
<div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Primary Panel
                        </div>
                        <div class="panel-body">
                            <?=Html::a('Delivery methods',['/settings/delivery-methods'],['class'=>'btn btn-primary btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                            Panel Footer
                        </div>
                    </div>
                </div>
<?php } ?>
<?php if(Yii::$app->user->can('add-department')) {?>
<div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Primary Panel
                        </div>
                        <div class="panel-body">
                            <?=Html::a('Department',['/settings/department'],['class'=>'btn btn-primary btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                            Panel Footer
                        </div>
                    </div>
                </div>
<?php } ?>
<?php if(Yii::$app->user->can('add-designation')) {?>
<div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Primary Panel
                        </div>
                        <div class="panel-body">
                            <?=Html::a('Designation',['/settings/designation'],['class'=>'btn btn-primary btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                            Panel Footer
                        </div>
                    </div>
                </div>
<?php } ?>
<?php if(Yii::$app->user->can('add-district')) {?>
<div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Primary Panel
                        </div>
                        <div class="panel-body">
                            <?=Html::a('District',['/settings/license'],['class'=>'btn btn-primary btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                            Panel Footer
                        </div>
                    </div>
                </div>
<?php } ?>

<?php if(Yii::$app->user->can('add-payment-mode')) {?>
<div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Primary Panel
                        </div>
                        <div class="panel-body">
                            <?=Html::a('Payment Mode',['/settings/patment-mode'],['class'=>'btn btn-primary btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                            Panel Footer
                        </div>
                    </div>
                </div>
<?php } ?>

<?php if(Yii::$app->user->can('add-postage-rate')) {?>
<div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Primary Panel
                        </div>
                        <div class="panel-body">
                            <?=Html::a('Postage Rate',['/settings/license'],['class'=>'btn btn-primary btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                            Panel Footer
                        </div>
                    </div>
                </div>
<?php } ?>
<?php if(Yii::$app->user->can('add-state')) {?>
<div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Primary Panel
                        </div>
                        <div class="panel-body">
                            <?=Html::a('State',['/settings/state'],['class'=>'btn btn-primary btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                            Panel Footer
                        </div>
                    </div>
                </div>
<?php } ?>
<?php if(Yii::$app->user->can('add-sub-department')) {?>
<div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Primary Panel
                        </div>
                        <div class="panel-body">
                            <?=Html::a('State',['/settings/sub-department'],['class'=>'btn btn-primary btn-lg btn-block'])?>  
                        </div>
                        <div class="panel-footer">
                            Panel Footer
                        </div>
                    </div>
                </div>
<?php } ?>
