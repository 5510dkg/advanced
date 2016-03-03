<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\circulation\models\Agency */
/* @var $form ActiveForm */
?>
<div class="backend-modules-circulation-views-agency-receipt-searchform">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'landline_no') ?>
        <?= $form->field($model, 'agency_type') ?>
        <?= $form->field($model, 'mobile_no') ?>
        <?= $form->field($model, 'mail_house_no') ?>
        <?= $form->field($model, 'mail_street_address') ?>
        <?= $form->field($model, 'mail_p_office') ?>
        <?= $form->field($model, 'mail_country_id') ?>
        <?= $form->field($model, 'mail_state_id') ?>
        <?= $form->field($model, 'mail_district_id') ?>
        <?= $form->field($model, 'mail_pincode') ?>
        <?= $form->field($model, 'commission') ?>
        <?= $form->field($model, 'route_id') ?>
        <?= $form->field($model, 'status') ?>
        <?= $form->field($model, 'comment') ?>
        <?= $form->field($model, 'issue_start_date') ?>
        <?= $form->field($model, 'add_street_address') ?>
        <?= $form->field($model, 'agency_combined_id') ?>
        <?= $form->field($model, 'train_no') ?>
        <?= $form->field($model, 'train_name') ?>
        <?= $form->field($model, 'source') ?>
        <?= $form->field($model, 'vehicle_id') ?>
        <?= $form->field($model, 'panchjanya') ?>
        <?= $form->field($model, 'organiser') ?>
        <?= $form->field($model, 'add_country_id') ?>
        <?= $form->field($model, 'add_state_id') ?>
        <?= $form->field($model, 'add_district_id') ?>
        <?= $form->field($model, 'add_pincode') ?>
        <?= $form->field($model, 'security_amt') ?>
        <?= $form->field($model, 'account_id') ?>
        <?= $form->field($model, 'address_status') ?>
        <?= $form->field($model, 'reference') ?>
        <?= $form->field($model, 'add_house_no') ?>
        <?= $form->field($model, 'add_p_office') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- backend-modules-circulation-views-agency-receipt-searchform -->
