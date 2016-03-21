<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\AgencyPayment */
/* @var $form yii\widgets\ActiveForm */
$this->title='Agency Payment';
?>
<div class="row">
    <div class="page-header">
        <h1>Agency Payment</h1>
    </div>
    
    
</div>
<div class="agency-payment-form">
    <div class="row">
    <div class="col-lg-6">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'agency_id')->textInput(['value'=>$id]) ?>

    <?= $form->field($model, 'bill_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'month')->widget(\dosamigos\datepicker\DatePicker::className(),
            [
                'clientOptions'=>[
                'autoclose'=>true,
                'format'=> "yyyy-mm",
                'startView'=> "months", 
                'minViewMode'=>"months"
                    ],
            ]) ?>

    <?= $form->field($model, 'balance')->textInput() ?>
    </div>
        <div class="row">
            <div class="col-lg-6">
    <?= $form->field($model, 'payment_mode')->dropDownList(yii\helpers\ArrayHelper::map(\backend\modules\settings\models\PaymentMode::find()->all(),'id','name'),['prompt'=>'Select Payment Mode']) ?>

    <?= $form->field($model, 'payment_detail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

  

    <?php ActiveForm::end(); ?>
            </div>
        </div>
        <div class="col-lg-offset-6">
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>
        </div>
    </div>
    
</div>
