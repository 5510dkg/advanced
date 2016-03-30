<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\typeahead\Typeahead;
use dosamigos\datepicker\DatePicker;
use yii\helpers\Url;

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
<div class="row">
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
                            return Url::toRoute(['billing/view', 'id' => $model->id]);
                        } else {
                            return Url::toRoute([$action, 'id' => $model->id]);
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
</div>