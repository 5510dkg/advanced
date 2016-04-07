<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\typeahead\Typeahead;
use dosamigos\datepicker\DatePicker;
use yii\helpers\Url;

$this->title='Agency|Search';
?>

<div class=" box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Single Railway Label</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="col-md-4">
       <?php $form = ActiveForm::begin(); ?>
        <?=$form->field($model, 'id')->hiddenInput(['value'=>$id])->label(false)?>
        <?=$form->field($model,'date')->widget( DatePicker::className(), [
                                                                        // inline too, not bad
                                                                         'inline' => false, 
                                                                         // modify template for custom rendering
                                                                       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                                                        'clientOptions' => [
                                                                            'autoclose' => true,
                                                                            'format' => 'yyyy-mm-dd',
                                                                            'startDate'=>date('Y-m-d'),
                                                                            'daysOfWeekDisabled'=> [1,2,3,4,5,6],
                                                                        ]
                        ]);?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div> 