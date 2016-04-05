<?php
$this->title='Agency Billing';
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
?>

<div class="row">
    <div class="page-header">
        <h1>Agency Billing</h1>
    </div>
</div>
<?php  if(!empty($error)){echo $error;}else{$error='';};?>
  <?php ActiveForm::begin(['action'=>'index.php?r=circulation/billing/create']); ?>
<div class="col-lg-4 col-lg-offset-3">
    
        <div class="form-group">   
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
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" class="form-control" />
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
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" class="form-control" />
        </div>
        <label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" class="form-control" />
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
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" class="form-control" />
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
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" class="form-control" />
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
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" class="form-control" />
        </div><label>Date</label> <?= DatePicker::widget([
         'name' => 'date1[]',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
             ]
     ]); ?> 
        <div class="form-group">
        <label>
            Price
        </label> 
        <input type="text" name="price[]" class="form-control" />
        </div>
        
    </div>
    
    
    <input type="submit" name="submit" value="Generate" class="btn btn-primary"/>
    <?php ActiveForm::end(); ?>
    
</div>

<?php $this->registerJs(
        
    '$("document").ready(function(){ 
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
