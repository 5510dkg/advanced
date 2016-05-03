<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\typeahead\Typeahead;
use dosamigos\datepicker\DatePicker;
use yii\helpers\Url;

$this->title='Bill';
//print_r($_POST['DynamicModel']['month']);
 //$_POST['DynamicModel']['month'];
//print_r($_POST);exit;

?>
<div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">Bill Search</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-3">
   <?php $form = ActiveForm::begin(); ?>
                <?php $last=date("Y-m", strtotime("first day of previous month")); ?>
        <?= $form->field($model, 'month')->widget(
    DatePicker::className(), [  
                                'clientOptions' => [
                                'autoclose' => true,
                                'format'=> "yyyy-mm",
                                'viewMode'=> "months", 
                                'minViewMode'=> "months",
                                'endDate'=>$last,
                                    
        ]
        ]);?></div>
        
        </div>
        
        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
   
</div>
    </div>
