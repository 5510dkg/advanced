<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title='Agency Management';?>
<div class="row">
    <div class="page-header">
        <h1>Agency Management</h1>
    </div>
</div>
<div class="col-sm-3">
     <?=Html::a('Update Address',['/circulation/agency',['q'=>'add']],['class'=>'btn btn-success btn-lg btn-block'])?>  
</div>
<div class="col-sm-3">
     <?=Html::a('Update Copies',['/circulation/agency',['q'=>'copy']],['class'=>'btn btn-success btn-lg btn-block'])?>  
</div>
<div class="col-sm-3">
     <?=Html::a('Deactivate Agecny',['/circulation/agency',['q'=>'deactive']],['class'=>'btn btn-warning btn-lg btn-block'])?>  
</div>
<div class="col-sm-3">
     <?=Html::a('Update Delivery Method',['/circulation/agency',['q'=>'delivery']],['class'=>'btn btn-success btn-lg btn-block'])?>  
</div>
