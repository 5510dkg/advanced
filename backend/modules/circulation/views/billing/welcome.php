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
    
    
    
    
    
</div>
<script>
    
</script>