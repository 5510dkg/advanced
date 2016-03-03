<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\AgencyBillBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agency-bill-book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'agency_id')->textInput() ?>

    <?= $form->field($model, 'issue_date')->textInput() ?>

    <?= $form->field($model, 'pjy')->textInput() ?>

    <?= $form->field($model, 'org')->textInput() ?>

    <?= $form->field($model, 'total_copies')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_per_piece')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discounted_amt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'final_total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'credit_amt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'credited_date')->textInput() ?>

    <?= $form->field($model, 'created_on')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
