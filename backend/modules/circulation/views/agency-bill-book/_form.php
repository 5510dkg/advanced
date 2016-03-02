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

    <?= $form->field($model, 'pay_method')->textInput() ?>

    <?= $form->field($model, 'issue_type')->dropDownList([ 'Regular' => 'Regular', 'Special Edition' => 'Special Edition', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'previous_security_amt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'received_security_amt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'final_security_amt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
