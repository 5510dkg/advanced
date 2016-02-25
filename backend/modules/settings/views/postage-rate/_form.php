<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\settings\models\DeliveryMethods;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\PostageRate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="postage-rate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rate')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model,'delivery_method')->dropDownList(ArrayHelper::map(DeliveryMethods::find()->all(),'id','name'),['prompt'=>'Please Select'])?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
