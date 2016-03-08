<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\MagazineRecordBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="magazine-record-book-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php //echo Html::dropDownList('name','',['0'=>'No','1'=>'Yes'],['id'=>'radioin','class'=>'form-control'])  ?>
    <div class="onediv" id="onediv">
    <?php $comp=Yii::$app->mycomponent->calsunday(); 
   // foreach($comp as $row){
    ?> 

    <?= $form->field($model, 'date')->widget(\dosamigos\datepicker\DatePicker::className(),
            [
                //'Value'=>'2016-03-'
                'clientOptions'=>[
                    'autoclose'=>true,
                    'format'=>'yyyy-mm-dd',
                    'daysOfWeekDisabled'=> [1,2,3,4,5,6],
                    //  'value'=>$row,
                    
                ]
            ])?>

    <?= $form->field($model, 'issue_type')->dropDownList([ 'Regular' => 'Regular', 'Special Edition' => 'Special Edition', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
        <?php //} ?>
    

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
    <script>
//   $(document).ready(function () {
//    
//    //agency-agency_type
//     $('#radioin').on('change', function() {
//      if ( this.value === '1')
//      //.....................^.......
//      {
//        $("#onediv").show();
//      }
//      else
//      {
//        $("#onediv").hide();
//      }
//    });
//  
//
//     if($('#radioin').val()==='1'){
//         $("#onediv").show();
//     }else{
//            $("#onediv").hide();
//       // console.log($('#agency-route_id').val());
//     }
//     
//   
//    
//        
//        
//        
//
//    // if($("#agency-route_id option[value='Rail']")){
//    //     console.log('YES');
//    //      $("#deliveryrail").hide();
//    //   }
//    // else{
//    //     console.log('No');
//    // }
//
//  
//
//
//});
</script>

