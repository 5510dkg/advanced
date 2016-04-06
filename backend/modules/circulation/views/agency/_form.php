<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\modules\settings\models\Country;
use backend\modules\settings\models\State;
use backend\modules\settings\models\District;
use backend\modules\settings\models\DeliveryMethods;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use kartik\typeahead\Typeahead;


/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\Agency */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agency-form">
    
    <?php $form = ActiveForm::begin(); ?>

            <!--address starts here -->
            
            <?php if($q=='copy'){?>
            
<div class=" box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Update Copies Records</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
                <?= $form->field($model, 'name')->textInput(['readonly'=>'readonly']) ?>
                <?= $form->field($model, 'email')->hiddenInput()->label(false) ?>
                 <?= $form->field($model,'agency_type')->hiddenInput([ 'Select agency type'=>'','Single' => 'Single', 'Combined' => 'Combined' ])->label(false);?>
       
        <div class="col-lg-6" style="display: none">
                <?= $form->field($model, 'landline_no')->hiddenInput()->label(FALSE) ?>
                <?= $form->field($model, 'mobile_no')->hiddenInput()->label(FALSE) ?>
                <div id='agencytypeshow' style="display:none">
                <?= $form->field($model,'agency_combined_id')->hiddenInput()->label(FALSE)?>    
                </div>

        </div>


    <div class="row" style="display: none">
        <div class="col-lg-12" style="display: none">
        <h4><em>Mailing Address Details</em></h4>
        </div>
        <div class="col-lg-6">
                <?= $form->field($model, 'mail_house_no')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'mail_street_address')->textarea(['rows' => 4]) ?>
                <?= $form->field($model, 'mail_p_office')->textInput(['maxlength' => true]) ?>
               
        </div>
         <div class="col-lg-6">
                <?= $form->field($model, 'mail_country_id')->dropDownList(ArrayHelper::map(Country::find()->all(),'id','name')) ?>
                <?= $form->field($model, 'mail_state_id')->dropDownList(ArrayHelper::map(State::find()->all(),'id','name'),
                    [
                        'prompt'=>'Please Select',
                        'onchange'=>'$.post( "index.php?r=settings/state/lists&id='.'"+$(this).val(), function( data ){
                                         $( "select#agency-mail_district_id" ).html( data );
                                           });'
                    ]) ?>
                <?= $form->field($model, 'mail_district_id')->dropDownList(ArrayHelper::map(District::find()->all(),'id','name'),['prompt'=>'Select District']) ?>
                <?= $form->field($model, 'mail_pincode')->textInput() ?>
        </div>
    </div>
    <div class="row" style="display: none">
        <div class="col-lg-12" style="display: none">
        <h4><em>Billing Address Details</em></h4>
        </div>
         <div class="col-lg-12">
                <?= $form->field($model, 'address_status')->checkbox(['value' => true])->label(false) ?>
        </div>
        <div id="autohideid">
        <div class="col-lg-6">
                <?= $form->field($model, 'add_house_no')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'add_street_address')->textarea(['rows' => 4]) ?>
                <?= $form->field($model, 'add_p_office')->textInput(['maxlength' => true]) ?>
            
        </div>
            <div class="col-lg-6" style="display: none;">
                <?= $form->field($model, 'add_country_id')->dropDownList(ArrayHelper::map(Country::find()->all(),'id','name')) ?>
                <?= $form->field($model, 'add_state_id')->dropDownList(ArrayHelper::map(State::find()->all(),'id','name'),
                    [
                        'prompt'=>'Please Select',
                        'onchange'=>'$.post( "index.php?r=settings/state/lists&id='.'"+$(this).val(), function( data ){
                                         $( "select#agency-add_district_id" ).html( data );
                                           });'
                    ]) ?>
                <?= $form->field($model, 'add_district_id')->dropDownList(ArrayHelper::map(District::find()->all(),'id','name'),['prompt'=>'Select District']) ?>
                <?= $form->field($model, 'add_pincode')->textInput() ?>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <h4><em>Copies Detail</em></h4>
        </div>
        <div class="col-lg-6">
                <?= $form->field($model, 'panchjanya')->textInput(['maxlength'=>'4']) ?>
              
        </div>
         <div class="col-lg-6">
                <?= $form->field($model, 'organiser')->textInput(['maxlength'=>'4']) ?>
        </div>
    </div>
   
    <div class="row">
<!--         <div class="col-lg-12">
         <h4><em>Other Details</em></h4>
         </div>-->
<div class="col-lg-6" style="display: none">
             <?= $form->field($model, 'route_id')->dropDownList(ArrayHelper::map(DeliveryMethods::find()->all(),'id','name'),['prompt'=>'Select Delivery Method']) ?>
             <?= $form->field($model, 'security_amt')->hiddenInput()->label(FALSE) ?>


             <?= $form->field($model,'comment')->hiddenInput()->label(FALSE) ?>
             <?= $form->field($model, 'vehicle_id')->hiddenInput() ?>
         </div>
           <div id="deliveryrail" class="col-lg-6" style="display:none">
           
                <?= $form->field($model,'source')->hiddenInput()->label(FALSE)?>
                <?= $form->field($model,'train_no')->hiddenInput()->label(FALSE)?>
                <?= $form->field($model,'train_name')->hiddenInput()->label(FALSE)?>
        
             
         </div>

          
        <div class="col-lg-6" style="display: none">
             
             <?= $form->field($model,'issue_start_date')->widget( DatePicker::className(), [
                                                                        // inline too, not bad
                                                                         'inline' => false, 
                                                                         // modify template for custom rendering
                                                                       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                                                        'clientOptions' => [
                                                                            'autoclose' => true,
                                                                            'format' => 'yyyy-mm-dd',
                                                                            'startDate'=>date('Y-m-d'),
                                                                        ]
                        ]); ?>
             <?= $form->field($model,'commission')->hiddenInput(['maxlength'=>true])?>
             <?= $form->field($model, 'status')->hiddenInput([ 'Suspended' => 'Suspended', 'Active' => 'Active', 'Inactive' => 'Inactive', ]) ?>
             <?= $form->field($model, 'reference')->hiddenInput(['maxlength' => true]) ?>
         </div>
    </div>
</div>
                <?php
                
                
                
            } ?>
           <!-- address ends here -->
            <!--copies starts here -->
            
            <?php if($q=='add'){?>
            <div class=" box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Update Address</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
                <?= $form->field($model, 'name')->textInput() ?>
                <?= $form->field($model, 'email')->hiddenInput()->label(false) ?>
                 <?= $form->field($model,'agency_type')->hiddenInput([ 'Select agency type'=>'','Single' => 'Single', 'Combined' => 'Combined' ])->label(false);?>
       
         <div class="col-lg-6">
                <?= $form->field($model, 'landline_no')->hiddenInput()->label(FALSE) ?>
                <?= $form->field($model, 'mobile_no')->hiddenInput()->label(FALSE) ?>
                <div id='agencytypeshow' style="display:none">
                <?= $form->field($model,'agency_combined_id')->hiddenInput()->label(FALSE)?>    
                </div>

        </div>

   

    <div class="row">
        <div class="col-lg-12">
        <h4><em>Mailing Address Details</em></h4>
        </div>
        <div class="col-lg-6">
                <?= $form->field($model, 'mail_house_no')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'mail_street_address')->textarea(['rows' => 4]) ?>
                <?= $form->field($model, 'mail_p_office')->textInput(['maxlength' => true]) ?>
               
        </div>
         <div class="col-lg-6">
                <?= $form->field($model, 'mail_country_id')->dropDownList(ArrayHelper::map(Country::find()->all(),'id','name')) ?>
                <?= $form->field($model, 'mail_state_id')->dropDownList(ArrayHelper::map(State::find()->all(),'id','name'),
                    [
                        'prompt'=>'Please Select',
                        'onchange'=>'$.post( "index.php?r=settings/state/lists&id='.'"+$(this).val(), function( data ){
                                         $( "select#agency-mail_district_id" ).html( data );
                                           });'
                    ]) ?>
                <?= $form->field($model, 'mail_district_id')->dropDownList(ArrayHelper::map(District::find()->all(),'id','name'),['prompt'=>'Select District']) ?>
                <?= $form->field($model, 'mail_pincode')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <h4><em>Billing Address Details</em></h4>
        </div>
         <div class="col-lg-12">
                <?= $form->field($model, 'address_status')->checkbox(['value' => true])->label(false) ?>
        </div>
        <div id="autohideid">
        <div class="col-lg-6">
                <?= $form->field($model, 'add_house_no')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'add_street_address')->textarea(['rows' => 4]) ?>
                <?= $form->field($model, 'add_p_office')->textInput(['maxlength' => true]) ?>
            
        </div>
        <div class="col-lg-6">
                <?= $form->field($model, 'add_country_id')->dropDownList(ArrayHelper::map(Country::find()->all(),'id','name')) ?>
                <?= $form->field($model, 'add_state_id')->dropDownList(ArrayHelper::map(State::find()->all(),'id','name'),
                    [
                        'prompt'=>'Please Select',
                        'onchange'=>'$.post( "index.php?r=settings/state/lists&id='.'"+$(this).val(), function( data ){
                                         $( "select#agency-add_district_id" ).html( data );
                                           });'
                    ]) ?>
                <?= $form->field($model, 'add_district_id')->dropDownList(ArrayHelper::map(District::find()->all(),'id','name'),['prompt'=>'Select District']) ?>
                <?= $form->field($model, 'add_pincode')->textInput() ?>
        </div>
        </div>
    </div>
    <div class="row">
<!--        <div class="col-lg-12">
        <h4><em>Copies Detail</em></h4>
        </div>-->
        <div class="col-lg-6">
                <?= $form->field($model, 'panchjanya')->hiddenInput()->label(FALSE) ?>
              
        </div>
         <div class="col-lg-6">
                <?= $form->field($model, 'organiser')->hiddenInput()->label(FALSE) ?>
        </div>
    </div>
   
    <div class="row">
<!--         <div class="col-lg-12">
         <h4><em>Other Details</em></h4>
         </div>-->
<div class="col-lg-6" style="display: none">
             <?= $form->field($model, 'route_id')->dropDownList(ArrayHelper::map(DeliveryMethods::find()->all(),'id','name'),['prompt'=>'Select Delivery Method']) ?>
             <?= $form->field($model, 'security_amt')->hiddenInput()->label(FALSE) ?>


             <?= $form->field($model,'comment')->hiddenInput()->label(FALSE) ?>
             <?= $form->field($model, 'vehicle_id')->hiddenInput() ?>
         </div>
           <div id="deliveryrail" class="col-lg-6" style="display:none">
           
                <?= $form->field($model,'source')->hiddenInput()->label(FALSE)?>
                <?= $form->field($model,'train_no')->hiddenInput()->label(FALSE)?>
                <?= $form->field($model,'train_name')->hiddenInput()->label(FALSE)?>
        
             
         </div>

          
        <div class="col-lg-6" style="display: none">
             
             <?= $form->field($model,'issue_start_date')->widget( DatePicker::className(), [
                                                                        // inline too, not bad
                                                                         'inline' => false, 
                                                                         // modify template for custom rendering
                                                                       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                                                        'clientOptions' => [
                                                                            'autoclose' => true,
                                                                            'format' => 'yyyy-mm-dd',
                                                                            'startDate'=>date('Y-m-d'),
                                                                        ]
                        ]); ?>
             <?= $form->field($model,'commission')->hiddenInput(['maxlength'=>true])?>
             <?= $form->field($model, 'status')->hiddenInput([ 'Suspended' => 'Suspended', 'Active' => 'Active', 'Inactive' => 'Inactive', ]) ?>
             <?= $form->field($model, 'reference')->hiddenInput(['maxlength' => true]) ?>
         </div>
    </div>
            </div>
                <?php } ?>
            
         <!-- copies ends here -->
            
            <!-- Delivery method starts here-->
            <?php if($q=='delivery'){?>
            <div class=" box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Update Delivery Method</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
                <?= $form->field($model, 'name')->textInput(['readonly'=>'readonly']) ?>
                <?= $form->field($model, 'email')->hiddenInput()->label(false) ?>
                 <?= $form->field($model,'agency_type')->hiddenInput([ 'Select agency type'=>'','Single' => 'Single', 'Combined' => 'Combined' ])->label(false);?>
        
        <div class="col-lg-6" style="display: none">
                <?= $form->field($model, 'landline_no')->hiddenInput()->label(FALSE) ?>
                <?= $form->field($model, 'mobile_no')->hiddenInput()->label(FALSE) ?>
                <div id='agencytypeshow' style="display:none">
                <?= $form->field($model,'agency_combined_id')->hiddenInput()->label(FALSE)?>    
                </div>

        </div>

   

    <div class="row" style="display: none">
        <div class="col-lg-12" style="display: none">
        <h4><em>Mailing Address Details</em></h4>
        </div>
        <div class="col-lg-6">
                <?= $form->field($model, 'mail_house_no')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'mail_street_address')->textarea(['rows' => 4]) ?>
                <?= $form->field($model, 'mail_p_office')->textInput(['maxlength' => true]) ?>
               
        </div>
         <div class="col-lg-6">
                <?= $form->field($model, 'mail_country_id')->dropDownList(ArrayHelper::map(Country::find()->all(),'id','name')) ?>
                <?= $form->field($model, 'mail_state_id')->dropDownList(ArrayHelper::map(State::find()->all(),'id','name'),
                    [
                        'prompt'=>'Please Select',
                        'onchange'=>'$.post( "index.php?r=settings/state/lists&id='.'"+$(this).val(), function( data ){
                                         $( "select#agency-mail_district_id" ).html( data );
                                           });'
                    ]) ?>
                <?= $form->field($model, 'mail_district_id')->dropDownList(ArrayHelper::map(District::find()->all(),'id','name'),['prompt'=>'Select District']) ?>
                <?= $form->field($model, 'mail_pincode')->textInput() ?>
        </div>
    </div>
    <div class="row" style="display: none">
        <div class="col-lg-12" style="display: none">
        <h4><em>Billing Address Details</em></h4>
        </div>
         <div class="col-lg-12">
                <?= $form->field($model, 'address_status')->checkbox(['value' => true])->label(false) ?>
        </div>
        <div id="autohideid">
        <div class="col-lg-6">
                <?= $form->field($model, 'add_house_no')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'add_street_address')->textarea(['rows' => 4]) ?>
                <?= $form->field($model, 'add_p_office')->textInput(['maxlength' => true]) ?>
            
        </div>
            <div class="col-lg-6" style="display: none;">
                <?= $form->field($model, 'add_country_id')->dropDownList(ArrayHelper::map(Country::find()->all(),'id','name')) ?>
                <?= $form->field($model, 'add_state_id')->dropDownList(ArrayHelper::map(State::find()->all(),'id','name'),
                    [
                        'prompt'=>'Please Select',
                        'onchange'=>'$.post( "index.php?r=settings/state/lists&id='.'"+$(this).val(), function( data ){
                                         $( "select#agency-add_district_id" ).html( data );
                                           });'
                    ]) ?>
                <?= $form->field($model, 'add_district_id')->dropDownList(ArrayHelper::map(District::find()->all(),'id','name'),['prompt'=>'Select District']) ?>
                <?= $form->field($model, 'add_pincode')->textInput() ?>
        </div>
        </div>
    </div>
    <div class="row" style="display: none">
        <div class="col-lg-12">
        <h4><em>Copies Detail</em></h4>
        </div>
        <div class="col-lg-6">
                <?= $form->field($model, 'panchjanya')->textInput() ?>
              
        </div>
         <div class="col-lg-6">
                <?= $form->field($model, 'organiser')->textInput() ?>
        </div>
    </div>
   
    <div class="row">
<!--         <div class="col-lg-12">
         <h4><em>Other Details</em></h4>
         </div>-->
<div class="col-lg-6">
             <?= $form->field($model, 'route_id')->dropDownList(ArrayHelper::map(DeliveryMethods::find()->all(),'id','name'),['prompt'=>'Select Delivery Method']) ?>
             <?= $form->field($model, 'security_amt')->hiddenInput()->label(FALSE) ?>


             <?= $form->field($model,'comment')->hiddenInput()->label(FALSE) ?>
             <?= $form->field($model, 'vehicle_id')->hiddenInput()->label(false) ?>
         </div>
           <div id="deliveryrail" class="col-lg-6" >
           
                <?= $form->field($model,'source')->textInput()?>
                <?= $form->field($model,'train_no')->textInput()?>
                <?= $form->field($model,'train_name')->textInput()?>
        
             
         </div>

          
        <div class="col-lg-6" style="display: none">
             
             <?= $form->field($model,'issue_start_date')->widget( DatePicker::className(), [
                                                                        // inline too, not bad
                                                                         'inline' => false, 
                                                                         // modify template for custom rendering
                                                                       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                                                        'clientOptions' => [
                                                                            'autoclose' => true,
                                                                            'format' => 'yyyy-mm-dd',
                                                                            'startDate'=>date('Y-m-d'),
                                                                        ]
                        ]); ?>
             <?= $form->field($model,'commission')->hiddenInput(['maxlength'=>'32'])->hint('please do not use % sign,use only full value like 33')?>
             <?= $form->field($model, 'status')->hiddenInput([ 'Suspended' => 'Suspended', 'Active' => 'Active', 'Inactive' => 'Inactive', ]) ?>
             <?= $form->field($model, 'reference')->hiddenInput(['maxlength' => true]) ?>
         </div>
    </div>
    </div>
                <?php } ?>
            <!-- delivery method ends here-->
            <!-- Deactivate Agency -->
            
            <?php if($q=='deactive'){?>
                <?= $form->field($model, 'name')->textInput(['readonly'=>'readonly']) ?>
                <?= $form->field($model, 'email')->hiddenInput()->label(false) ?>
                 <?= $form->field($model,'agency_type')->hiddenInput([ 'Select agency type'=>'','Single' => 'Single', 'Combined' => 'Combined' ])->label(false);?>
        </div>
        <div class="col-lg-6" style="display: none">
                <?= $form->field($model, 'landline_no')->hiddenInput()->label(FALSE) ?>
                <?= $form->field($model, 'mobile_no')->hiddenInput()->label(FALSE) ?>
                <div id='agencytypeshow' style="display:none">
                <?= $form->field($model,'agency_combined_id')->hiddenInput()->label(FALSE)?>    
                </div>

        </div>

    </div>

    <div class="row" style="display: none">
        <div class="col-lg-12" style="display: none">
        <h4><em>Mailing Address Details</em></h4>
        </div>
        <div class="col-lg-6">
                <?= $form->field($model, 'mail_house_no')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'mail_street_address')->textarea(['rows' => 4]) ?>
                <?= $form->field($model, 'mail_p_office')->textInput(['maxlength' => true]) ?>
               
        </div>
         <div class="col-lg-6">
                <?= $form->field($model, 'mail_country_id')->dropDownList(ArrayHelper::map(Country::find()->all(),'id','name')) ?>
                <?= $form->field($model, 'mail_state_id')->dropDownList(ArrayHelper::map(State::find()->all(),'id','name'),
                    [
                        'prompt'=>'Please Select',
                        'onchange'=>'$.post( "index.php?r=settings/state/lists&id='.'"+$(this).val(), function( data ){
                                         $( "select#agency-mail_district_id" ).html( data );
                                           });'
                    ]) ?>
                <?= $form->field($model, 'mail_district_id')->dropDownList(ArrayHelper::map(District::find()->all(),'id','name'),['prompt'=>'Select District']) ?>
                <?= $form->field($model, 'mail_pincode')->textInput() ?>
        </div>
    </div>
    <div class="row" style="display: none">
        <div class="col-lg-12" style="display: none">
        <h4><em>Billing Address Details</em></h4>
        </div>
         <div class="col-lg-12">
                <?= $form->field($model, 'address_status')->checkbox(['value' => true])->label(false) ?>
        </div>
        <div id="autohideid">
        <div class="col-lg-6">
                <?= $form->field($model, 'add_house_no')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'add_street_address')->textarea(['rows' => 4]) ?>
                <?= $form->field($model, 'add_p_office')->textInput(['maxlength' => true]) ?>
            
        </div>
            <div class="col-lg-6" style="display: none;">
                <?= $form->field($model, 'add_country_id')->dropDownList(ArrayHelper::map(Country::find()->all(),'id','name')) ?>
                <?= $form->field($model, 'add_state_id')->dropDownList(ArrayHelper::map(State::find()->all(),'id','name'),
                    [
                        'prompt'=>'Please Select',
                        'onchange'=>'$.post( "index.php?r=settings/state/lists&id='.'"+$(this).val(), function( data ){
                                         $( "select#agency-add_district_id" ).html( data );
                                           });'
                    ]) ?>
                <?= $form->field($model, 'add_district_id')->dropDownList(ArrayHelper::map(District::find()->all(),'id','name'),['prompt'=>'Select District']) ?>
                <?= $form->field($model, 'add_pincode')->textInput() ?>
        </div>
        </div>
    </div>
    <div class="row" style="display: none">
        <div class="col-lg-12">
        <h4><em>Copies Detail</em></h4>
        </div>
        <div class="col-lg-6">
                <?= $form->field($model, 'panchjanya')->textInput() ?>
              
        </div>
         <div class="col-lg-6">
                <?= $form->field($model, 'organiser')->textInput() ?>
        </div>
    </div>
   
    <div class="row" style="display: none">
<!--         <div class="col-lg-12">
         <h4><em>Other Details</em></h4>
         </div>-->
<div class="col-lg-6">
             <?= $form->field($model, 'route_id')->dropDownList(ArrayHelper::map(DeliveryMethods::find()->all(),'id','name'),['prompt'=>'Select Delivery Method']) ?>
             <?= $form->field($model, 'security_amt')->hiddenInput()->label(FALSE) ?>


             <?= $form->field($model,'comment')->hiddenInput()->label(FALSE) ?>
             <?= $form->field($model, 'vehicle_id')->hiddenInput()->label(false) ?>
         </div>
           <div id="deliveryrail" class="col-lg-6" >
           
                <?= $form->field($model,'source')->textInput()?>
                <?= $form->field($model,'train_no')->textInput()?>
                <?= $form->field($model,'train_name')->textInput()?>
        
             
         </div>
<div class="col-lg-6">
    <?= $form->field($model, 'status')->dropDownList([ 'Suspended' => 'Suspended', 'Active' => 'Active', 'Inactive' => 'Inactive', ]) ?>
</div>

          
        <div class="col-lg-6" style="display: none">
             
             <?= $form->field($model,'issue_start_date')->widget( DatePicker::className(), [
                                                                        // inline too, not bad
                                                                         'inline' => false, 
                                                                         // modify template for custom rendering
                                                                       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                                                        'clientOptions' => [
                                                                            'autoclose' => true,
                                                                            'format' => 'yyyy-mm-dd',
                                                                            'startDate'=>date('Y-m-d'),
                                                                        ]
                        ]); ?>
             <?= $form->field($model,'commission')->hiddenInput(['maxlength'=>true])?>
             
             <?= $form->field($model, 'reference')->hiddenInput(['maxlength' => true]) ?>
            
         </div>

    </div>
                <?php } ?>
            
            <!-- deactivate agency ends here-->
                <?php if($q=='no'){?>
            <div class=" box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">New Agency</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="col-lg-6">
                <?= $form->field($model, 'name')->textInput(['maxlength'=>'60']) ?>
                <?= $form->field($model, 'email')->textInput() ?>
                 <?= $form->field($model,'agency_type')->dropDownList([ 'Select agency type'=>'','Single' => 'Single', 'Combined' => 'Combined' ]);?>
        </div>
         <div class="col-lg-6">
                <?= $form->field($model, 'landline_no')->textInput(['maxlength'=>'8']) ?>
                <?= $form->field($model, 'mobile_no')->textInput(['maxlength'=>'10']) ?>
                <div id='agencytypeshow' style="display:none">
                <?= $form->field($model,'agency_combined_id')->widget(Typeahead::classname(), [
                    'dataset' => [
                        [
                            'local' => $acc,
                            'limit' => 10
                        ]
                    ],
                    'pluginOptions' => ['highlight' => true],
                    'options' => ['placeholder' => 'Filter as you type ...'],
]);?>    
                </div>

        </div>


    <div class="row">
        <div class="col-lg-12">
        <h4><em>Mailing Address Details</em></h4>
        </div>
        <div class="col-lg-6">
                <?= $form->field($model, 'mail_house_no')->textInput(['maxlength' => '60']) ?>
                <?= $form->field($model, 'mail_street_address')->textarea(['rows' => 4,'maxlength'=>'250']) ?>
                <?= $form->field($model, 'mail_p_office')->textInput(['maxlength' => 60]) ?>
               
        </div>
         <div class="col-lg-6">
                <?= $form->field($model, 'mail_country_id')->dropDownList(ArrayHelper::map(Country::find()->all(),'id','name')) ?>
                <?= $form->field($model, 'mail_state_id')->dropDownList(ArrayHelper::map(State::find()->all(),'id','name'),
                    [
                        'prompt'=>'Please Select',
                        'onchange'=>'$.post( "index.php?r=settings/state/lists&id='.'"+$(this).val(), function( data ){
                                         $( "select#agency-mail_district_id" ).html( data );
                                           });'
                    ]) ?>
                <?= $form->field($model, 'mail_district_id')->dropDownList(ArrayHelper::map(District::find()->all(),'id','name'),['prompt'=>'Select District']) ?>
                <?= $form->field($model, 'mail_pincode')->textInput(['maxlength'=>'6']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <h4><em>Billing Address Details</em></h4>
        </div>
         <div class="col-lg-12">
                <?= $form->field($model, 'address_status')->checkbox(['value' => true])->label(false) ?>
        </div>
        <div id="autohideid">
        <div class="col-lg-6">
                <?= $form->field($model, 'add_house_no')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'add_street_address')->textarea(['rows' => 4]) ?>
                <?= $form->field($model, 'add_p_office')->textInput(['maxlength' => true]) ?>
            
        </div>
        <div class="col-lg-6">
                <?= $form->field($model, 'add_country_id')->dropDownList(ArrayHelper::map(Country::find()->all(),'id','name')) ?>
                <?= $form->field($model, 'add_state_id')->dropDownList(ArrayHelper::map(State::find()->all(),'id','name'),
                    [
                        'prompt'=>'Please Select',
                        'onchange'=>'$.post( "index.php?r=settings/state/lists&id='.'"+$(this).val(), function( data ){
                                         $( "select#agency-add_district_id" ).html( data );
                                           });'
                    ]) ?>
                <?= $form->field($model, 'add_district_id')->dropDownList(ArrayHelper::map(District::find()->all(),'id','name'),['prompt'=>'Select District']) ?>
                <?= $form->field($model, 'add_pincode')->textInput(['maxlength'=>'6']) ?>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <h4><em>Copies Detail</em></h4>
        </div>
        <div class="col-lg-6">
                <?= $form->field($model, 'panchjanya')->textInput(['maxlength'=>'4']) ?>
              
        </div>
         <div class="col-lg-6">
                <?= $form->field($model, 'organiser')->textInput(['maxlength'=>'4']) ?>
        </div>
    </div>
   
    <div class="row">
         <div class="col-lg-12">
         <h4><em>Other Details</em></h4>
         </div>
         <div class="col-lg-6">
             <?= $form->field($model, 'route_id')->dropDownList(ArrayHelper::map(DeliveryMethods::find()->all(),'id','name'),['prompt'=>'Select Delivery Method']) ?>
             <?= $form->field($model, 'security_amt')->textInput(['maxlength' => true]) ?>


             <?= $form->field($model,'comment')->textarea(['rows'=>'4']) ?>
             <?= $form->field($model, 'vehicle_id')->textInput(['maxlength'=>'45']) ?>
         </div>
           <div id="deliveryrail" class="col-lg-6" style="display:none">
           
                <?= $form->field($model,'source')->textInput(['maxlength'=>'60'])?>
                <?= $form->field($model,'train_no')->textInput(['maxlength'=>'8'])?>
                <?= $form->field($model,'train_name')->textInput(['maxlength'=>'80'])?>
        
             
         </div>

          
         <div class="col-lg-6">
             <?= $form->field($model,'issue_start_date')->widget( DatePicker::className(), [
                                                                        // inline too, not bad
                                                                         'inline' => false, 
                                                                         // modify template for custom rendering
                                                                       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                                                        'clientOptions' => [
                                                                            'autoclose' => true,
                                                                            'format' => 'yyyy-mm-dd',
                                                                            'startDate'=>date('Y-m-d'),
                                                                        ]
                        ]); ?>
             <?= $form->field($model,'commission')->textInput(['maxlength'=>true])->hint('Please do not use % sign')?>
             <?= $form->field($model, 'status')->dropDownList([ 'Suspended' => 'Suspended', 'Active' => 'Active', 'Inactive' => 'Inactive', ]) ?>
             <?= $form->field($model, 'reference')->widget(Typeahead::classname(), [
                    'dataset' => [
                        [
                            'local' => $data,
                            'limit' => 10
                        ]
                    ],
                    'pluginOptions' => ['highlight' => true],
                    'options' => ['placeholder' => 'Filter as you type ...'],
]); ?>
         </div>
    </div>
</div>
                <?php } ?>
     
   <?php if (!Yii::$app->request->isAjax){ ?>
    <div class="form-group" style="margin-left: 35%">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>
       

    <?php ActiveForm::end(); ?>
    
</div>


<?php $this->registerJs("
   $(document).ready(function () {
    $('#agency-address_status').change(function () {
        
     // $('#autohideid').fadeToggle();
       if($(this).is(':checked')){
 
        $('#agency-add_house_no').val( $('#agency-mail_house_no').val() );
        $('#agency-add_street_address').val( $('#agency-mail_street_address').val() );
        $('#agency-add_p_office').val( $('#agency-mail_p_office').val() );
        $('#agency-add_country_id').val( $('#agency-mail_country_id').val() );
        $('#agency-add_state_id').val( $('#agency-mail_state_id').val() );
        $('#agency-add_district_id').val( $('#agency-mail_district_id').val() );
        $('#agency-add_pincode').val( $('#agency-mail_pincode').val() );
        }
        else if($(this).is(':not(:checked)')){
        $('#agency-add_house_no').val('');
        $('#agency-add_street_address').val('');
        $('#agency-add_p_office').val('');
        $('#agency-add_country_id').val('');
        $('#agency-add_state_id').val('');
        $('#agency-add_district_id').val('');
        $('#agency-add_pincode').val('');
            }
      
    });
    //district change 
    $('#agency-mail_district_id').on('change', function() {
          $('#agency-add_district_id').val('');
          $('#agency-add_pincode').val('');
    });
    
    //agency-agency_type
     $('#agency-agency_type').on('change', function() {
      if ( this.value == 'Combined')
      //.....................^.......
      {
        $('#agencytypeshow').show();
      }
      else
      {
        $('#agencytypeshow').hide();
      }
    });
   //Delivery method detail
   //agency-agency_type
     $('#agency-route_id').on('change', function() {
      if ( this.value == '5')
      //.....................^.......
      {

        $('#deliveryrail').show();
        $('agency-source').prop('required',true);
        $('#agency-train_no').prop('required', true);
        $('#agency-train_name').prop('required',true);

      }
      else
      {
        $('#deliveryrail').hide();
      }
    });  
     //slected in rail method in edit mode

     if($('#agency-route_id').val()=='5'){
         $('#deliveryrail').show();
     }else{
            $('#deliveryrail').hide();
       // console.log($('#agency-route_id').val());
     }
     if($('#agency-agency_type').val()=='Combined'){
          $('#agencytypeshow').show();
     }else{
            $('#agencytypeshow').hide();
       // console.log($('#agency-route_id').val());
     }
     

    // if($('#agency-route_id option[value='Rail']')){
    //     console.log('YES');
    //      $('#deliveryrail').hide();
    //   }
    // else{
    //     console.log('No');
    // }

  


});");