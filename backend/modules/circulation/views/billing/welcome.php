<?php
$this->title='Agency Billing';
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
?>

<?php  if(!empty($error)){echo $error;}else{$error='';};?>
<div class="box box-success" id="hidediv">
        <div class="box-header with-border">
        <h3 class="box-title">Generate Bill</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <h4><i> Have You Submitted All Receipts In the Last Month...?</i></h4>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn btn-lg btn-success" id="Y">Yes</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
         <button class="btn btn-lg btn-success" id="N">No</button>
    </div>
</div>
<div class="box box-danger" id="msgdiv">
        <div class="box-header with-border">
        <h3 class="box-title">!Warning</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <h4><i>Please Submit All Receipts First. Then Try Again... </i></h4>
       
    </div>
</div>
  <?php ActiveForm::begin(['action'=>'index.php?r=circulation/billing/create']); ?>
<div class="col-lg-4 col-lg-offset-3" id="showdiv">
    <div class="box box-success">
        <div class="box-header with-border">
        <h3 class="box-title">Generate Bill</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="form-group">   
            <?php $last=date("Y-m", strtotime("first day of previous month")); ?>
            <?php $lastd=date("Y-m-d", strtotime("first day of previous month")); ?>
    <h4>Generate bill for the month </h4>
    <?= DatePicker::widget([
    'name' => 'date',
    //'value' => '02-16-2012',
    
       
    'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format'=> "yyyy-mm",
            'viewMode'=> "months", 
            'minViewMode'=> "months",
            'startDate'=>$last,
           
           
        ]
]); ?>
    <br/>
    <h4>No of. Special Editions In Selected Month</h4>
    
    <select class="form-control" id="optionselect" name="time" required="required">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        
    </select>
        </div>
    <div class="one" id="one">
            <label>Date</label>
             <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
                 'daysOfWeekDisabled'=> [1,2,3,4,5,6],
                 'startDate'=>$lastd,
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" maxlength="3" class="form-control" />
        </div>
       
    </div>
    <div class="two" id="two">
        <label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
                 'daysOfWeekDisabled'=> [1,2,3,4,5,6],
                 'startDate'=>$lastd,
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" maxlength="3" class="form-control" />
        </div>
        <label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
                 'daysOfWeekDisabled'=> [1,2,3,4,5,6],
                 'startDate'=>$lastd,
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" maxlength="3" class="form-control" />
        </div>
        
    </div>
    <div class="three" id="three">
        
        <label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
                 'daysOfWeekDisabled'=> [1,2,3,4,5,6],
                 'startDate'=>$lastd,
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" maxlength="3" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
                 'daysOfWeekDisabled'=> [1,2,3,4,5,6],
                 'startDate'=>$lastd,
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" maxlength="3" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
                 'daysOfWeekDisabled'=> [1,2,3,4,5,6],
                 'startDate'=>$lastd,
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" maxlength="3" class="form-control" />
        </div>
    
    </div>
    <div class="four" id="four">
        <label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
                 'daysOfWeekDisabled'=> [1,2,3,4,5,6],
                 'startDate'=>$lastd,
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" maxlength="3" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
                 'daysOfWeekDisabled'=> [1,2,3,4,5,6],
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" maxlength="3" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
                 'daysOfWeekDisabled'=> [1,2,3,4,5,6],
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
            <input type="text" name="price[]" maxlength="3" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
                 'daysOfWeekDisabled'=> [1,2,3,4,5,6],
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" maxlength="3" class="form-control" />
        </div>
        
    </div>
    <div class="five" id="five">
        <label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
                 'daysOfWeekDisabled'=> [1,2,3,4,5,6],
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" maxlength="3" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
                 'daysOfWeekDisabled'=> [1,2,3,4,5,6],
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" maxlength="3" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
                 'daysOfWeekDisabled'=> [1,2,3,4,5,6],
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" maxlength="3" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
                 'daysOfWeekDisabled'=> [1,2,3,4,5,6],
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" maxlength="3" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
                 'daysOfWeekDisabled'=> [1,2,3,4,5,6],
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
            <input type="text" name="price[]" maxlength="3" class="form-control" />
        </div>
        
    </div>
    
    
    <input type="submit" name="submit" value="Generate" class="btn btn-primary"/>
    <?php ActiveForm::end(); ?>
    
</div>
    </div>
</div>

<?php $this->registerJs(
        
    '$("document").ready(function(){ 
         $("#showdiv").hide();
          $("#msgdiv").hide();
         $("#Y").on("click", function() {
         $("#hidediv").hide();
         $("#showdiv").show();
          $("#msgdiv").hide();
         });
          $("#N").on("click", function() {
         $("#hidediv").hide();
         $("#showdiv").hide();
         $("#msgdiv").show();
         });
 $("#optionselect").on("change", function() {
   // alert("hii");
      if ( this.value == "1")
      {
         $("#one").show();
         $("#two").hide();
         $("#three").hide();
         $("#four").hide();
         $("#five").hide()
      }
      if ( this.value == "0")
      {
         $("#one").hide();
         $("#two").hide();
         $("#three").hide();
         $("#four").hide();
         $("#five").hide()
      }
      if ( this.value == "2")
      {
         $("#one").hide();
         $("#two").show();
         $("#three").hide();
         $("#four").hide();
         $("#five").hide()
      }
      if ( this.value == "3")
      {
         $("#one").hide();
         $("#two").hide();
         $("#three").show();
         $("#four").hide();
         $("#five").hide()
      }
      if ( this.value == "4")
      {
         $("#one").hide();
         $("#two").hide();
         $("#three").hide();
         $("#four").show();
         $("#five").hide()
      }
      if ( this.value == "5")
      {
         $("#one").hide();
         $("#two").hide();
         $("#three").hide();
         $("#four").hide();
         $("#five").show()
      }
     
    }); 
    if($("#optionselect").val()=="0"){
         $("#one").hide();
         $("#two").hide();
         $("#three").hide();
         $("#four").hide();
         $("#five").hide()
     }
});'
);   
