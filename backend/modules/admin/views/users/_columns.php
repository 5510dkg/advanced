<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

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
        'attribute'=>'username',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'email',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute' => 'department_id',
        'value' => 'department.name',
        'filter' => Html::activeDropDownList($searchModel, 'department_id', ArrayHelper::map(\backend\modules\settings\models\Department::find()->asArray()->all(), 'id', 'name'),['class'=>'form-control','prompt' => 'Select Department']),

    ],
  
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'name',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'department_id',
    // ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'role_group_id',
         'value' => 'roleGroup.name',
         'filter' => Html::activeDropDownList($searchModel, 'role_group_id', ArrayHelper::map(\backend\modules\settings\models\RoleGroup::find()->asArray()->all(), 'id', 'name'),['class'=>'form-control','prompt' => 'Select Role Group']),
     ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'deleted_at',
    // ],
//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'status',
//         'value' => function ($model) {
//         return $model->status == 10 ? 'Active' : 'Blocked';
//    },
//         
//     ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'created_at',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'updated_at',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
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