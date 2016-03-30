<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\typeahead\Typeahead;
use dosamigos\datepicker\DatePicker;

$this->title='Bill|Search';
?>
<div class="row">
    <div class="page-header">
        <h1>Agency Billing |Search</h1>
    </div>
</div>

<div class="row">
    <div class="form-vertical">
   <?php $form = ActiveForm::begin(); ?>
 
        <?= $form->field($model, 'name')->widget(Typeahead::classname(), [
                    'dataset' => [
                        [
                            'local' => $data,
                            'limit' => 10
                        ]
                    ],
                    'pluginOptions' => ['highlight' => true],
                    'options' => ['placeholder' => 'Filter as you type ...'],
]); ?>
        <?= $form->field($model, 'account_id') ?>
        <?= $form->field($model, 'mail_pincode')->label('Pin Code') ?>
 
        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>