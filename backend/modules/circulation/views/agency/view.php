<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\Agency */
?>
<div class="agency-view">
    <div class="col-md-6">    
 <div class=" box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">New Agency</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:ntext',
            'account_id',
            'route_id',
            'vehicle_id',
            'reference',
//            'email:email',
//            'landline_no',
//            'mobile_no',
//            'status',
//            'security_amt',
//            'address_status',
//            'mail_house_no',
//            'mail_street_address:ntext',
//            'mail_p_office',
//            'mail_country_id',
//            'mail_state_id',
//            'mail_district_id',
//            'mail_pincode',
//            'panchjanya',
//            'organiser',
//            'add_house_no',
//            'add_street_address:ntext',
//            'add_p_office',
//            'add_country_id',
//            'add_state_id',
//            'add_district_id',
//            'add_pincode',
        ],
    ]) ?>
    </div>
 </div>
    </div>
    <div class="col-md-6">
    <div class="box box-danger">
         <div class="box-header with-border">
        <h3 class="box-title">Supply Address Details</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
        <div class="box-body">
            <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:ntext',
            'account_id',
            'route_id',
            'vehicle_id',
            'reference',
//            'email:email',
//            'landline_no',
//            'mobile_no',
//            'status',
//            'security_amt',
//            'address_status',
//            'mail_house_no',
//            'mail_street_address:ntext',
//            'mail_p_office',
//            'mail_country_id',
//            'mail_state_id',
//            'mail_district_id',
//            'mail_pincode',
//            'panchjanya',
//            'organiser',
//            'add_house_no',
//            'add_street_address:ntext',
//            'add_p_office',
//            'add_country_id',
//            'add_state_id',
//            'add_district_id',
//            'add_pincode',
        ],
    ]) ?>
        </div>
    </div>   
    </div>

</div>
