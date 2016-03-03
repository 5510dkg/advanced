<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\AgencyReceipt */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="agency-receipt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'agency_id')->textInput(['value'=>$id,'type'=>'readonly']) ?>

    <?= $form->field($model, 'rcpt_date')->widget(\dosamigos\datepicker\DatePicker::className(),
            [
                'clientOptions'=>[
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
                    ],
            ]) ?>

    <?= $form->field($model, 'cr_amt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payment_mode')->dropDownList(\yii\helpers\ArrayHelper::map(backend\modules\settings\models\PaymentMode::find()->all(),'id','name'),['prompt'=>'Please Select Payment Mode']) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
