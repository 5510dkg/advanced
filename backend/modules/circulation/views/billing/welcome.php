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
  <?php ActiveForm::begin(['action'=>'index.php?r=circulation/billing/create']); ?>
<div class="col-lg-11">
    
        <div class="form-group">   
    <h3>Generate bill for the month </h3>
    <?= DatePicker::widget([
    'name' => 'date',
    //'value' => '02-16-2012',
    'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format'=> "yyyy-mm",
            'viewMode'=> "months", 
            'minViewMode'=> "months"
        ]
]); ?>
    <br/>
    <h3>No of. Special Editions In Selected Month</h3>
    <select class="form-control" id="optionselect" required="required">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        
    </select>
        </div>
    <div class="one" id="one">
        
            <?= DatePicker::widget([
         'name' => 'date1',
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
        <?= DatePicker::widget([
         'name' => 'date1',
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
        <?= DatePicker::widget([
         'name' => 'date1',
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
        <?= DatePicker::widget([
         'name' => 'date1',
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
        </div><?= DatePicker::widget([
         'name' => 'date1',
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
        </div><?= DatePicker::widget([
         'name' => 'date1',
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
        <?= DatePicker::widget([
         'name' => 'date1',
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
        </div><?= DatePicker::widget([
         'name' => 'date1',
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
        </div><?= DatePicker::widget([
         'name' => 'date1',
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
        </div><?= DatePicker::widget([
         'name' => 'date1',
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
        <?= DatePicker::widget([
         'name' => 'date1',
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
        </div><?= DatePicker::widget([
         'name' => 'date1',
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
        </div><?= DatePicker::widget([
         'name' => 'date1',
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
        </div><?= DatePicker::widget([
         'name' => 'date1',
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
        </div><?= DatePicker::widget([
         'name' => 'date1',
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
    
    
    <input type="submit" name="submit" value="Generate" checked="btn btn-lg-success"/>
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
