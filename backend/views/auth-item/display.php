<?php  
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php if($use=='create'){ ?> Update/Assign Access Rights <?php } if($use=='list'){ ?> Display Access Rights
                    <?php } ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<?php $form = ActiveForm::begin([
    'method' => 'post',
    'action'=>'index.php?r=auth-item/list'
]); ?>
    
<?=Html::dropDownList('user','',  yii\helpers\ArrayHelper::map(common\models\User::find()->all(),'id','name'),
        ['class'=>'form-control'])?>

<div class="col-lg-offset-4"><?=Html::submitButton('Proceed..',['class'=>'btn btn-lg btn-success'])?>
</div>
<?php ActiveForm::end() ?>