
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Change Password';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-changepassword">
    
<div class=" box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Please fill out the following fields to change password </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
    
    <?php $form = ActiveForm::begin([
        'id'=>'changepassword-form',
        'options'=>['class'=>'form-horizontal'],
        'fieldConfig'=>[
            'template'=>"{label}\n<div class=\"col-lg-3\">
                        {input}</div>\n<div class=\"col-lg-5\">
                        {error}</div>",
            'labelOptions'=>['class'=>'col-lg-2 control-label'],
        ],
    ]); ?>
        
       
        <?= $form->field($model,'newpass',['inputOptions'=>[
            'placeholder'=>'New Password'
        ]])->passwordInput() ?>
       
        <?= $form->field($model,'repeatnewpass',['inputOptions'=>[
            'placeholder'=>'Repeat New Password'
        ]])->passwordInput() ?>
       
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-11">
                <?= Html::submitButton('Change password',[
                    'class'=>'btn btn-primary'
                ]) ?>
            </div>
        </div>
    </div>
    </div>
    <?php ActiveForm::end(); ?>
</div> 