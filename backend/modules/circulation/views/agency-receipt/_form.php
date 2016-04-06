<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\AgencyReceipt */
/* @var $form yii\widgets\ActiveForm */

?>

<div class=" box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Agency Receipt </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
<div class="agency-receipt-form">
    <div class="row">
        <div class="col-md-4">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'agency_id')->textInput(['value'=>$id,'readonly'=>'readonly']) ?>

    <?= $form->field($model, 'rcpt_date')->widget(\dosamigos\datepicker\DatePicker::className(),
            [
                'clientOptions'=>[
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
                    ],
            ]) ?>
        </div>
        <div class="col-md-4">
    <?= $form->field($model, 'cr_amt')->textInput(['maxlength' => '6']) ?>

    <?= $form->field($model, 'payment_mode')->dropDownList(\yii\helpers\ArrayHelper::map(backend\modules\settings\models\PaymentMode::find()->all(),'id','name'),['prompt'=>'Please Select Payment Mode']) ?>
        </div>
        <div class="col-md-4">
    <?= $form->field($model, 'comment')->textarea(['rows' => 2]) ?>

    </div>
    <div class="col-md-12">
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>
    </div>
    <?php ActiveForm::end(); ?>
    
</div>
    </div>
</div>