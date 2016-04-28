<?php
$this->title='Home';

?>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

?> 
<div id="loadercomp">
<div class=" box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Label Generation</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">

        <div class="row">
            <div class="col-md-12">    
                <?php $form= ActiveForm::begin()?>
                <table class="table-bordered table-responsive table-condensed" style="width: 100%;">
                    <tr>
                        <td colspan="2">
                              <?= $form->field($model, 'date')->widget( DatePicker::className(), [
                            // inline too, not bad
                            'inline' => false, 
                            // modify template for custom rendering
                            // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                            'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'daysOfWeekDisabled'=> [1,2,3,4,5,6],
                           // 'startDate'=>date('Y-m-d'),
                        ]
                        ]); ?>
                        </td>
                    </tr>
                    <tr>
                    
                    <th>
                        Name
                    </th>
                    <th colspan="5">
                        Sort By
                    </th>
                    </tr>
                    <tr>
                        <td>
                            <?=$form->field($model, 'railway')->checkbox(array( 
                                            //'label'=>'railway', 
                                            'labelOptions'=>array('style'=>'padding:5px;'), 
                                            'disabled'=>false 
                                            )) 
?>
                        </td>
                        <td>
                            <?=$form->field($model, 'state')->dropDownList([''=>'Please Select','1'=>'State','2'=>'District','3'=>'Post Office','4'=>'Panchjanya Only','5'=>'Organiser Only'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'district')->dropDownList([''=>'Please Select','1'=>'State','2'=>'District','3'=>'Post Office','4'=>'Panchjanya Only','5'=>'Organiser Only'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'po')->dropDownList([''=>'Please Select','1'=>'State','2'=>'District','3'=>'Post Office','4'=>'Panchjanya Only','5'=>'Organiser Only'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'copy')->dropDownList([''=>'Please Select','1'=>'Panchjanya Only','2'=>'Organiser Only'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'train')->dropDownList([''=>'Please Select','1'=>'Train '])->label(false);?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?=$form->field($model, 'ordinary')->checkbox(array( 
                                            //'label'=>'railway', 
                                            'labelOptions'=>array('style'=>'padding:5px;'), 
                                            'disabled'=>false 
                                            )) 
?>
                        </td>
                        <td>
                            <?=$form->field($model, 'state1')->dropDownList([''=>'Please Select','1'=>'State','2'=>'District','3'=>'Post Office','4'=>'Panchjanya Only','5'=>'Organiser Only'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'district1')->dropDownList([''=>'Please Select','1'=>'State','2'=>'District','3'=>'Post Office','4'=>'Panchjanya Only','5'=>'Organiser Only'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'po1')->dropDownList([''=>'Please Select','1'=>'State','2'=>'District','3'=>'Post Office','4'=>'Panchjanya Only','5'=>'Organiser Only'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'copy1')->dropDownList([''=>'Please Select','1'=>'Panchjanya Only','2'=>'Organiser Only'])->label(false);?>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            <?=$form->field($model, 'registered')->checkbox(array( 
                                            //'label'=>'railway', 
                                            'labelOptions'=>array('style'=>'padding:5px;'), 
                                            'disabled'=>false 
                                            )) 
?>
                        </td>
                        <td>
                            <?=$form->field($model, 'state2')->dropDownList([''=>'Please Select','1'=>'State','2'=>'District','3'=>'Post Office','4'=>'Panchjanya Only','5'=>'Organiser Only'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'district2')->dropDownList([''=>'Please Select','1'=>'State','2'=>'District','3'=>'Post Office','4'=>'Panchjanya Only','5'=>'Organiser Only'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'po2')->dropDownList([''=>'Please Select','1'=>'State','2'=>'District','3'=>'Post Office','4'=>'Panchjanya Only','5'=>'Organiser Only'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'copy2')->dropDownList([''=>'Please Select','1'=>'Panchjanya Only','2'=>'Organiser Only'])->label(false);?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?=$form->field($model, 'vpp')->checkbox(array( 
                                            //'label'=>'railway', 
                                            'labelOptions'=>array('style'=>'padding:5px;'), 
                                            'disabled'=>false 
                                            )) 
?>
                        </td>
                        <td>
                            <?=$form->field($model, 'state3')->dropDownList([''=>'Please Select','1'=>'State','2'=>'District','3'=>'Post Office','4'=>'Panchjanya Only','5'=>'Organiser Only'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'district3')->dropDownList([''=>'Please Select','1'=>'State','2'=>'District','3'=>'Post Office','4'=>'Panchjanya Only','5'=>'Organiser Only'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'po3')->dropDownList([''=>'Please Select','1'=>'State','2'=>'District','3'=>'Post Office','4'=>'Panchjanya Only','5'=>'Organiser Only'])->label(false);?>
                        </td>
                        <td>
                            <?=$form->field($model, 'copy3')->dropDownList([''=>'Please Select','1'=>'Panchjanya Only','2'=>'Organiser Only'])->label(false);?>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                           <div class="form-group" style="margin-left: 45%">
	        <?= Html::submitButton('Generate Lebels', ['class' =>'btn btn-success',

]) ?>
	    </div> 
                        </td>
                    </tr>
                    
                </table>
                <?php ActiveForm::end()?>
            </div>
        </div></div></div>
</div>
<?php $this->registerJS("$('#dynamicmodel-state').change(function() {
   if($(this).val() ==1){
  // $('#dynamicmodel-district').val('');
   $('#dynamicmodel-district option:contains(State)').attr('disabled','disabled');
      }
      if($(this).val() ==2){
  // $('#dynamicmodel-district').val('');
   $('#dynamicmodel-district option:contains(District)').attr('disabled','disabled');
      }
      if($(this).val() ==3){
  // $('#dynamicmodel-district').val('');
   $('#dynamicmodel-district option:contains(Post Office)').attr('disabled','disabled');
      }
      if($(this).val() ==4){
  // $('#dynamicmodel-district').val('');
   $('#dynamicmodel-district option:contains(Panchjanya Only)').attr('disabled','disabled');
      }
 
});
    $('#dynamicmodel-district').change(function() {
   if($(this).val() ==1){
  // $('#dynamicmodel-district').val('');
   $('#dynamicmodel-district option:contains(State)').attr('disabled','disabled');
      }
      if($(this).val() ==2){
  // $('#dynamicmodel-district').val('');
   $('#dynamicmodel-district option:contains(District)').attr('disabled','disabled');
      }
      if($(this).val() ==3){
  // $('#dynamicmodel-district').val('');
   $('#dynamicmodel-district option:contains(Post Office)').attr('disabled','disabled');
      }
      if($(this).val() ==4){
  // $('#dynamicmodel-district').val('');
   $('#dynamicmodel-district option:contains(Panchjanya Only)').attr('disabled','disabled');
      }
 
});







"); ?>

