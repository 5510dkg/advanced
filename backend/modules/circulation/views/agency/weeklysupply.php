<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\typeahead\Typeahead;
use dosamigos\datepicker\DatePicker;
use yii\helpers\Url;

$this->title='Weekly Supply Download';
?>

<div class=" box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Search Agency</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">

        <div class="row">
             <?php $form = ActiveForm::begin(); ?>
            <div class="col-md-4"> 
             <?= $form->field($model, 'from_date')->widget( DatePicker::className(), [
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
            </div>
            <div class="col-md-4"> 
             <?= $form->field($model, 'to_date')->widget( DatePicker::className(), [
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
            </div>
            <div class="col-md-4">    
  
       
      
                <?= $form->field($model,'state')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\modules\settings\models\State::find()->all(),'id','name'),[
                    'prompt'=>'Select State'
                ])?>
       
      
            </div>
            <div class="col-md-4">
               <?= $form->field($model, 'post_office')->widget(Typeahead::classname(), [
                    'dataset' => [
                        [
                            'local' => $data,
                            'limit' => 10
                        ]
                    ],
                    'pluginOptions' => ['highlight' => true],
                    'options' => ['placeholder' => 'Enter PO Name ...'],
]); ?> 
                
            </div>
            
            <div class="col-md-12">    
        <div class="form-group">
            <?= Html::submitButton('Download', ['class' => 'btn btn-primary']) ?>
        </div>
            </div>
    <?php ActiveForm::end(); ?>
    </div>
    </div>     
</div> 