<?php
$this->title='Agency Billing';

use dosamigos\datepicker\DatePicker;
?>

<div class="row">
    <div class="page-header">
        <h1>Agency Billing</h1>
    </div>
</div>
<div class="col-lg-11">
    
        
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
    <div class="one">
        
            <?= DatePicker::widget([
         'name' => 'date1',
         //'value' => '02-16-2012',
         'template' => '{addon}{input}',
             'clientOptions' => [
                 'autoclose' => true,
                 'format'=> "yyyy-mm-dd",
             ]
     ]); ?> 
       
    </div>
    <div class="two">
        
    </div>
    <div class="three">
    
    </div>
    <div class="four">
        
    </div>
    <div class="five">
        
    </div>
    
    
    
    
</div>
<script>
    
</script>