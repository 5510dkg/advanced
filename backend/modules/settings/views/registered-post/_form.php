<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\RegisteredPost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registered-post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'top_tempelate')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'wt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'postage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tagline')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sn_tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pjy_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'org_name')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
