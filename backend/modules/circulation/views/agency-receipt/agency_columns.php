<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\modules\settings\models\Country;
use backend\modules\settings\models\State;
use backend\modules\settings\models\District;

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
        'attribute'=>'name',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'account_id',
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'route_id',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'vehicle_id',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'reference',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'email',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'landline_no',
    // ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'mobile_no',
//    ],
   
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'security_amt',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'address_status',
    //     'value'=>'status',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'mail_house_no',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'mail_street_address',
    // ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'mail_p_office',
     ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'mail_country_id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'mail_state_id',
        'value'=>'state.name',
        'filter' => Html::activeDropDownList($searchModel, 'mail_state_id', ArrayHelper::map(State::find()->asArray()->all(), 'id', 'name'),['class'=>'form-control','prompt' => 'Select State'
            ]),
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'mail_district_id',
        'value'=>'district.name',
         'filter' => Html::activeDropDownList($searchModel, 'mail_district_id', ArrayHelper::map(District::find()->where(['state_id'=>$searchModel->mail_state_id])->all(), 'id', 'name'),['class'=>'form-control','prompt' => 'Select District']),
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'mail_pincode',
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'panchjanya',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'organiser',
    // ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'status',
//        'value' => function ($model) {
//
//          if ($model->status === 'Active') {
//            return 'Active';
//            // "x" icon in red color
//        } elseif($model->status=='Suspended') {
//            return 'Suspended'; // check icon 
//        }
//        else{
//            return 'Inactive';
//        }
//    },
//        'filter'=>Html::activedropDownList($searchModel,'status',[ 'Suspended' => 'Suspended', 'Active' => 'Active', 'Inactive' => 'Inactive', ],['class'=>'form-control','prompt' => '']),
//        
//    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'add_house_no',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'add_street_address',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'add_p_office',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'add_country_id',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'add_state_id',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'add_district_id',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'add_pincode',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
         'template'=>'{info}',
        'vAlign'=>'middle',
       
        'buttons' => [
        'info' => function ($url, $model) {
            return Html::a('<span></span><span class="glyphicon glyphicon-list"></span>', $url, [
                        'title' => Yii::t('app', 'Add Receipt'),
            ]);
         }
        ],
         'urlCreator' => function($action, $model, $key, $index) { 
          if ($action === 'info') {
                            return Url::toRoute(['ordinary-posted-data/print', 'id' => $model->id]);
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