<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\typeahead\Typeahead;
use dosamigos\datepicker\DatePicker;
use yii\helpers\Url;
use keygenqt\autocompleteAjax\AutocompleteAjax;

$this->title='Agency|Search';
$data=  \backend\modules\circulation\controllers\AgencyController::actionAgencylist();

?>

<div class=" box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Search Agency</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">

        <div class="row">
            <div class="col-md-4">    
   <?php $form = ActiveForm::begin(['method' => 'get']); ?>
       
        <?= $form->field($model, 'name')->widget(Typeahead::classname(), [
                    'dataset' => [
                        [
                            'local' => $data,
                            'limit' => 10
                        ]
                    ],
                    'pluginOptions' => ['highlight' => true],
                    'options' => ['placeholder' => 'Enter Agency Name ...'],
]); ?>
                <?= $form->field($model,'mail_state_id')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\modules\settings\models\State::find()->all(),'id','name'),[
                    'prompt'=>'Select state'
                ])?>
       
      
            </div>
            <div class="col-md-4">
               <?= $form->field($model, 'account_id') ?>  
                
            </div>
            
            <div class="col-md-4">
                  <?= $form->field($model, 'mail_pincode')->label('Pin Code') ?>
            </div>
              <div class="col-md-4">
                  <?= $form->field($model, 'mail_p_office')->widget(AutocompleteAjax::classname(), [
    'multiple' => false,
    'url' => ['agency/postoffice'],
    'options' => ['placeholder' => 'Post office']
]) ?>
            </div>
            
            <div class="col-md-4">
                  <?= $form->field($model, 'status')->dropDownList(['Active'=>'Active','Suspended'=>'Suspended','Inactive'=>'Inactive'])->label('Status') ?>
            </div>
            <div class="col-md-12">    
        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        </div>
            </div>
    <?php ActiveForm::end(); ?>
    </div>
    </div>     
</div>    
