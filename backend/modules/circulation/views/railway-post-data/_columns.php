<?php
use yii\helpers\Url;
use yii\helpers\Html;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'date',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'time',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'generated_date',
    ],
     [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'template'=>'{view}{info}',
        'vAlign'=>'middle',
       
        'buttons' => [
        'info' => function ($url, $model) {
            return Html::a('<span></span><span class="glyphicon glyphicon glyphicon-print"></span>', $url, [
                        'title' => Yii::t('app', 'Info'),
            ]);
         }
        ],
         'urlCreator' => function($action, $model, $key, $index) { 
          if ($action === 'info') {
                            return Url::toRoute(['railway-posted-data/print', 'id' => $model->id]);
                        } else {
                            return Url::toRoute([$action, 'id' => $model->id]);
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