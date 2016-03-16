<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\settings\models\RoleGroup;
use backend\modules\settings\models\Designation;
use backend\modules\settings\models\Department;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">
   
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-6">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?php if($model->isNewRecord){ ?>
    <?= $form->field($model, 'password_hash')->textInput(['hidden' => !$model->isNewRecord]) ?>
    <?php }?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
   </div>
     <div class="col-lg-6">
     <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
     <?= $form->field($model, 'extension_no')->textInput(['maxlength' => true]) ?>
     
    <?= $form->field($model, 'role_group_id')->dropDownList(
 ArrayHelper::map(RoleGroup::find()->all(),'id','name'),['prompt'=>'Select Role Group']
            )  ?>

    <?= $form->field($model, 'department_id')->dropDownList(
 ArrayHelper::map(Department::find()->all(),'id','name'),[
     'prompt'=>'Select Department',
     'onchange'=>'$.post( "index.php?r=settings/designation/lists&id='.'"+$(this).val(), function( data ) 
         {
         $( "select#users-designation_id" ).html( data );
           });']
            ) ?>
</div>
    
     <div class="col-lg-12">
      <?= $form->field($model, 'designation_id')->dropDownList(
 ArrayHelper::map(Designation::find()->all(),'id','designation_name'),['prompt'=>'Select Designation']
            )  ?>
     </div>     
    
                <?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>
  
    <?php ActiveForm::end(); ?>
    
</div>
<script>
   $(document).ready(function () {
    $("#users-name").on('change', function() {
     // $('#autohideid').fadeToggle();
        var ui=$('#users-name').val();
        var newvar =ui.replace(/\s*,\s*|\s+(?=\S+$)/g, '.');
        
        $('#users-username').val(newvar);
       
    });
    

  


});
</script>