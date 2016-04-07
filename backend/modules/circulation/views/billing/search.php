<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\typeahead\Typeahead;
use dosamigos\datepicker\DatePicker;

$this->title='Bill|Search';
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
                 <?php $last=date("Y-m", strtotime("first day of previous month")); ?>
            <?php $lastd=date("Y-m-d", strtotime("first day of previous month")); ?>
   <?php $form = ActiveForm::begin(); ?>
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
            <div class="col-md-3">
        <?= $form->field($model, 'name')->widget(Typeahead::classname(), [
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
            <div class="col-md-3">
                <?= $form->field($model, 'account_id') ?>
            </div>
            <div class="col-md-3">
        <?= $form->field($model, 'mail_pincode')->label('Pin Code') ?>
            </div>
        </div>
        
 
        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
   
</div>
    </div>
