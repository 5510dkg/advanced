<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\AgencyBillBookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agency-bill-book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'agency_id') ?>

    <?= $form->field($model, 'issue_date') ?>

    <?= $form->field($model, 'pjy') ?>

    <?= $form->field($model, 'org') ?>

    <?php // echo $form->field($model, 'total_copies') ?>

    <?php // echo $form->field($model, 'price_per_piece') ?>

    <?php // echo $form->field($model, 'total_price') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'discounted_amt') ?>

    <?php // echo $form->field($model, 'final_total') ?>

    <?php // echo $form->field($model, 'credit_amt') ?>

    <?php // echo $form->field($model, 'credited_date') ?>

    <?php // echo $form->field($model, 'pay_method') ?>

    <?php // echo $form->field($model, 'issue_type') ?>

    <?php // echo $form->field($model, 'previous_security_amt') ?>

    <?php // echo $form->field($model, 'received_security_amt') ?>

    <?php // echo $form->field($model, 'final_security_amt') ?>

    <?php // echo $form->field($model, 'created_on') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
