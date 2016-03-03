<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\Agency */
/* @var $form ActiveForm */
?>
<div class="searchform">

    <?php $form = ActiveForm::begin(['enableClientValidation'=>false,'enableAjaxValidation' => false]); ?>
    <div class="row">
        <div class="col-lg-6">
        <?= $form->field($model, 'account_id') ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'mail_p_office') ?>
        <?= $form->field($model, 'mail_country_id') ?>
        </div>
        <div class="col-lg-6">
        <?= $form->field($model, 'mail_state_id') ?>
        <?= $form->field($model, 'mail_district_id') ?>
        <?= $form->field($model, 'mail_pincode') ?>
        </div>    
    </div>    
        
     <!-- Submit button -->                           
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- searchform -->
