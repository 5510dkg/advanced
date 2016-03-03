<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\settings\models\Country;
use backend\modules\settings\models\State;
use backend\modules\settings\models\District;
use backend\modules\settings\models\DeliveryMethods;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\Agency */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agency-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-12">
        <h4><em>Agency Basic Details</em></h4>
        </div>
        <div class="col-lg-6">
                <?= $form->field($model, 'name')->textInput() ?>
                <?= $form->field($model, 'email')->textInput() ?>
                 <?= $form->field($model,'agency_type')->dropDownList([ 'Select agency type'=>'','Single' => 'Single', 'Combined' => 'Combined' ]);?>
        </div>
         <div class="col-lg-6">
                <?= $form->field($model, 'landline_no')->textInput() ?>
                <?= $form->field($model, 'mobile_no')->textInput() ?>
                <div id='agencytypeshow' style="display:none">
                <?= $form->field($model,'agency_combined_id')->textInput()?>    
                </div>

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
         <div class="col-lg-12">
         <h4><em>Other Details</em></h4>
         </div>
         <div class="col-lg-6">
             <?= $form->field($model, 'route_id')->dropDownList(ArrayHelper::map(DeliveryMethods::find()->all(),'id','name'),['prompt'=>'Select Delivery Method']) ?>
             <?= $form->field($model, 'security_amt')->textInput(['maxlength' => true]) ?>


             <?= $form->field($model,'comment')->textarea(['rows'=>'4']) ?>
             <?= $form->field($model, 'vehicle_id')->textInput() ?>
         </div>
           <div id="deliveryrail" class="col-lg-6" style="display:none">
           
                <?= $form->field($model,'source')->textInput()?>
                <?= $form->field($model,'train_no')->textInput()?>
                <?= $form->field($model,'train_name')->textInput()?>
        
             
         </div>

          
         <div class="col-lg-6">
             <?= $form->field($model,'issue_start_date')->widget( DatePicker::className(), [
                                                                        // inline too, not bad
                                                                         'inline' => false, 
                                                                         // modify template for custom rendering
                                                                       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                                                        'clientOptions' => [
                                                                            'autoclose' => true,
                                                                            'format' => 'yyyy-mm-dd'
                                                                        ]
                        ]); ?>
             <?= $form->field($model,'commission')->textInput(['maxlength'=>true])?>
             <?= $form->field($model, 'status')->dropDownList([ 'Suspended' => 'Suspended', 'Active' => 'Active', 'Inactive' => 'Inactive', ]) ?>
             <?= $form->field($model, 'reference')->textInput(['maxlength' => true]) ?>
         </div>
    </div>

   <?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
<script>
   $(document).ready(function () {
    $("[type=checkbox]").change(function () {
     // $('#autohideid').fadeToggle();
        
        $('#agency-add_house_no').val( $('#agency-mail_house_no').val() );
        $('#agency-add_street_address').val( $('#agency-mail_street_address').val() );
        $('#agency-add_p_office').val( $('#agency-mail_p_office').val() );
        $('#agency-add_country_id').val( $('#agency-mail_country_id').val() );
        $('#agency-add_state_id').val( $('#agency-mail_state_id').val() );
        $('#agency-add_district_id').val( $('#agency-mail_district_id').val() );
        $('#agency-add_pincode').val( $('#agency-mail_pincode').val() );
    });
    //agency-agency_type
     $('#agency-agency_type').on('change', function() {
      if ( this.value == 'Combined')
      //.....................^.......
      {
        $("#agencytypeshow").show();
      }
      else
      {
        $("#agencytypeshow").hide();
      }
    });
   //Delivery method detail
   //agency-agency_type
     $('#agency-route_id').on('change', function() {
      if ( this.value == '5')
      //.....................^.......
      {

        $("#deliveryrail").show();
        $("#agency-source").prop('required',true);
        $("#agency-train_no").prop('required', true);
        $("#agency-train_name").prop('required',true);

      }
      else
      {
        $("#deliveryrail").hide();
      }
    });  
     //slected in rail method in edit mode

     if($('#agency-route_id').val()=='5'){
         $("#deliveryrail").show();
     }else{
            $("#deliveryrail").hide();
       // console.log($('#agency-route_id').val());
     }
     if($('#agency-agency_type').val()=='Combined'){
          $("#agencytypeshow").show();
     }else{
            $("#agencytypeshow").hide();
       // console.log($('#agency-route_id').val());
     }

    // if($("#agency-route_id option[value='Rail']")){
    //     console.log('YES');
    //      $("#deliveryrail").hide();
    //   }
    // else{
    //     console.log('No');
    // }

  


});
</script>