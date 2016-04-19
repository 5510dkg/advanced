<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title='Agency Management';
?>

<div class="row">
<div class="col-sm-3">
     <?=Html::a('Update Address',['/circulation/agency/searchaddress',['q'=>'add']],['class'=>'btn btn-success btn-lg btn-block'])?>  
</div>
<div class="col-sm-3">
     <?=Html::a('New Agency',['/circulation/agency/create'],['class'=>'btn btn-success btn-lg btn-block'])?>  
</div>
<div class="col-sm-3">
     <?=Html::a('Update Supply',['/circulation/agency/searchcopies',['q'=>'copy']],['class'=>'btn btn-success btn-lg btn-block'])?>  
</div>
    <div class="col-sm-3">
     <?=Html::a('Deactivate Agency',['/circulation/agency/searchdeactivate',['q'=>'deactive']],['class'=>'btn btn-warning btn-lg btn-block'])?>  
</div>
</div>

<div class="row" style="margin-top: 10px;">
<div class="col-sm-3">
     <?=Html::a('Update Delivery Method',['/circulation/agency/searchdelivery',['q'=>'delivery']],['class'=>'btn btn-success btn-lg btn-block'])?>  
</div>
    <div class="col-sm-3">
     <?=Html::a('View Agency Detail',['/circulation/agency/searchview',['q'=>'delivery']],['class'=>'btn btn-success btn-lg btn-block'])?>  
</div>
     <div class="col-sm-3">
     <?=Html::a('Upload Agency Excel',['/circulation/agency/upload',['q'=>'delivery']],['class'=>'btn btn-danger btn-lg btn-block'])?>  
</div>
</div>
