<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\typeahead\Typeahead;
use dosamigos\datepicker\DatePicker;

$this->title='Agency|Search';
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
                <?= $form->field($model,'state')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\modules\settings\models\State::find()->all(),'id','name'),[
                    'prompt'=>'Select State'
                ])?>
       
      
            </div>
            <div class="col-md-4">
               <?= $form->field($model, 'account_id') ?>  
                
            </div>
            
            <div class="col-md-4">
                  <?= $form->field($model, 'mail_pincode')->label('Pin Code') ?>
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

<div class=" box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Search Agency</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
    <div class="row">
        <div class="col-md-12">    
    <?= \yii\grid\GridView::widget([
    'dataProvider' => $list,
     'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
        'account_id',
        'mail_pincode',
        'reference',
        ['class'=>'yii\grid\ActionColumn',
         'template'=>'{edit}',
        'buttons' => [
        'bill' => function ($url, $model) {
            return Html::a('<span></span><span class="glyphicon glyphicon glyphicon-eye"></span>', $url, [
                        'title' => Yii::t('app', 'edit'),
            ]);
         }
        ],
         'urlCreator' => function($action, $model, $key, $index) { 
                        return Url::toRoute([$action, 'id' => $model->id]);
        },
            ],
         ],
        
    'options' => [
        'tag' => 'div',
        'class' => 'list-wrapper',
        'id' => 'list-wrapper',
    ],
    'layout' => "{summary}\n{pager}\n{items}",
   
]);
?>
        </div>
</div>
    </div>
</div>
