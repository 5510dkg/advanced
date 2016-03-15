<?php  
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Reset Password </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="col-lg-4 col-sm-offset-2">
<?php $form = ActiveForm::begin([
    'method' => 'post',
    'action'=>'index.php?r=admin/users/resetpass'
]); ?>
    
<?=Html::input('hidden','uid',$id)?>
<?=Html::input('text','pass','',['class'=>'form-control'])?>

<div class="col-lg-offset-4"><?=Html::submitButton('Save',['class'=>'btn btn-lg btn-success'])?>
</div>
<?php ActiveForm::end() ?>
</div>