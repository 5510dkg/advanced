<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\settings\models\Department;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\SubDepartment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sub-department-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

       <?= $form->field($model, 'department_id')->dropDownList(
 ArrayHelper::map(Department::find()->all(),'id','name'),['prompt'=>'Select Department']
            )  ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
