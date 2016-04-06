<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\AgencyCreditNote */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Credit Note Form</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
<div class="agency-credit-note-form">
    <div class="row">
    <div class="col-md-4">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'agency_id')->textInput(['value'=>$id,'readonly'=>'readonly']) ?>
        
    
    
    <?= $form->field($model, 'return_date')->widget( DatePicker::className(), [
                                                                        // inline too, not bad
                                                                         'inline' => false, 
                                                                         // modify template for custom rendering
                                                                       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                                                        'clientOptions' => [
                                                                            'autoclose' => true,
                                                                            'format' => 'yyyy-mm-dd',
                                                                           // 'daysOfWeekDisabled'=> [1,2,3,4,5,6],
                                                                            
                                                                        ]
                        ]); ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'issue_type')->dropDownList([ 'Regular Edition' => 'Regular Edition','Special Edition' => 'Special Edition', ]) ?>

    <?= $form->field($model, 'pjy')->textInput() ?>
    </div>
    <div class="col-md-4">

    <?= $form->field($model, 'org')->textInput() ?>

    <?= $form->field($model, 'issue_date')->widget( DatePicker::className(), [
                                                                        // inline too, not bad
                                                                         'inline' => false, 
                                                                         // modify template for custom rendering
                                                                       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                                                        'clientOptions' => [
                                                                            'autoclose' => true,
                                                                            'format' => 'yyyy-mm-dd',
                                                                            'daysOfWeekDisabled'=> [1,2,3,4,5,6],
                                                                            
                                                                        ]
                        ]); ?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">

    <?= $form->field($model, 'return_type')->dropDownList([ 'cut' => 'cut','RSL' => 'RSL','copy'=>'copy' ]) ?>

    </div>
    <div class="col-md-12">
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>
    </div>
    </div>

    <?php ActiveForm::end(); ?>
    
</div>
</div>
</div>