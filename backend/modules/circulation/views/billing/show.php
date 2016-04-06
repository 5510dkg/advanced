<?php 
use yii\helpers\Html;

$this->title='Bill|Search';?>

<div class="col-xs-6 col-md-offset-2">
   <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                The Bill For the month <strong> <?=$month?></strong> has been generated successfully.<strong><?=  Html::a('Show Bill',['billing/search'])?></strong>
                            </div>
</div>


