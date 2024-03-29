<?php
use yii\helpers\Url;
use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
//$searchModel='';

return [
//    [
//        'class' => 'kartik\grid\CheckboxColumn',
//        'width' => '20px',
//    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
//        // [
//        // 'class'=>'\kartik\grid\DataColumn',
//        // 'attribute'=>'id',
//    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'agency_id',
        'value'=>'agencyname.name',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'issue_date',
//        'filter'=>DatePicker::widget([
//                    'name'=>'issue_date',
//                  // 'model' => $searchmodel,
//                    'attribute' => 'issue_date',
//                   // 'template' => '{addon}{input}',
//                    'clientOptions' => [
//                        'autoclose' => true,
//                        'format' => 'yyyy-mm-dd',
//           
//                ]
//]),
    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'pjy',
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'org',
//    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'total_copies',
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'price_per_piece',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'total_price',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'discount',
     ],
//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'discounted_amt',
//     ],
    
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'credit_amt',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'credited_date',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'final_total',
     ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'created_on',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'template'=>'{info}',
        'buttons' => [
        'info' => function ($url, $model) {
            return Html::a('<span></span><span class="glyphicon glyphicon glyphicon-print"></span>', $url, [
                        'title' => Yii::t('app', 'Print'),
            ]);
         }
        ],
        'urlCreator' => function($action, $model, $key, $index) { 
                if ($action === 'info') {
                            return Url::toRoute(['agency-bill-book/print', 'id' => $model->id]);
                        } else {
                            return Url::toRoute([$action, 'id' => $key]);
                        }

        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   