<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\AgencyCreditNote */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agency-credit-note-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'agency_id')->textInput(['value'=>$id]) ?>
    

    <?= $form->field($model, 'return_date')->widget( DatePicker::className(), [
                                                                        // inline too, not bad
                                                                         'inline' => false, 
                                                                         // modify template for custom rendering
                                                                       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                                                        'clientOptions' => [
                                                                            'autoclose' => true,
                                                                            'format' => 'yyyy-mm-dd',
                                                                            'daysOfWeekDisabled'=> [1,2,3,4,5,6],
                                                                            
                                                                        ]
                        ]); ?>

    <?= $form->field($model, 'issue_type')->dropDownList([ 'Regular Edition' => 'Regular Edition','Special Edition' => 'Special Edition', ]) ?>

    <?= $form->field($model, 'pjy')->textInput() ?>

    <?= $form->field($model, 'org')->textInput() ?>

    <?= $form->field($model, 'issue_date')->widget( DatePicker::className(), [
                                                                        // inline too, not bad
                                                                         'inline' => false, 
                                                                         // modify template for custom rendering
                                                                       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                                                        'clientOptions' => [
                                                                            'autoclose' => true,
                                                                            'format' => 'yyyy-mm-dd',
                                                                            'daysOfWeekDisabled'=> [1,2,3,4,5,6],
                                                                            
                                                                        ]
                        ]); ?>

    <?= $form->field($model, 'return_type')->dropDownList([ 'cut' => 'cut','RSL' => 'RSL','copy'=>'copy' ]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
