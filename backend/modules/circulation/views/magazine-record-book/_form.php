<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\MagazineRecordBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="magazine-record-book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->widget(dosamigos\datepicker\DatePicker::className(),
            [
                // inline too, not bad
                                                                         'inline' => false, 
                                                                         // modify template for custom rendering
                                                                       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                                                        'clientOptions' => [
                                                                            'autoclose' => true,
                                                                            'format' => 'yyyy-mm-dd',
                                                                             'daysOfWeekDisabled'=> [1,2,3,4,5,6],
                                                                        ]
                
            ]) ?>

    <?= $form->field($model, 'issue_type')->dropDownList([ 'Regular' => 'Regular', 'Special Edition' => 'Special Edition', ], ['Selected' => 'Special Edition']) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','name'=>'submit']) ?>
    
    
        <?= Html::submitButton('Create & Add New', ['class' => 'btn btn-primary', 'value'=>'Create & Add New', 'name'=>'submit']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
