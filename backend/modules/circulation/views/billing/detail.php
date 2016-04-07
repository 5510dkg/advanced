<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\typeahead\Typeahead;
use dosamigos\datepicker\DatePicker;
use yii\helpers\Url;

$this->title='Bill|Search';
//print_r($_POST['DynamicModel']['month']);
 $_POST['DynamicModel']['month'];
//print_r($_POST);exit;

?>
<div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">Bill Search</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-3">
   <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'month')->widget(
    DatePicker::className(), [  
                                'clientOptions' => [
                                'autoclose' => true,
                                'format'=> "yyyy-mm",
                                'viewMode'=> "months", 
                                'minViewMode'=> "months",
        ]
        ]);?></div>
            <div class="col-md-3">
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
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'account_id') ?>
            </div>
            <div class="col-md-3">
        <?= $form->field($model, 'mail_pincode')->label('Pin Code') ?>
            </div>
        </div>
        
 
        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
   
</div>
    </div>
<div class="box box-success">
        <div class="box-header with-border">
        <h3 class="box-title">Search Results</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        
    <?= \yii\grid\GridView::widget([
    'dataProvider' => $list,
     'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
        'account_id',
        'mail_pincode',
        'reference',
        ['class'=>'yii\grid\ActionColumn',
         'template'=>'{view}',
        'buttons' => [
        'bill' => function ($url, $model) {
            return Html::a('<span></span><span class="glyphicon glyphicon glyphicon-eye"></span>', $url, [
                        'title' => Yii::t('app', 'View Bill'),
            ]);
         }
        ],
         'urlCreator' => function($action, $model, $key, $index) { 
          if ($action === 'bill') {
                            // $month=$monthdata;
                            return Url::toRoute(['billing/view', 'id' => $model->id,'month'=>$_POST['DynamicModel']['month']]);
                        } else {
                            // $month=$monthdata;
                            return Url::toRoute([$action, 'id' => $model->id,'month'=>$_POST['DynamicModel']['month']]);
                        }

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

    </div></div>