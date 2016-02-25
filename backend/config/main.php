<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' => [ 'class' => '\kartik\grid\Module' ],
        'admin' => [
            'class' => 'backend\modules\admin\Admin',
        ],
         'settings' => [
            'class' => 'backend\modules\settings\Settings',
        ],
         'user' => [
            'class' => 'backend\modules\user\User',
        ],
        'approver' => [
            'class' => 'backend\modules\approver\Approver',
        ],
         'manager' => [
            'class' => 'backend\modules\manager\Manager',
        ],
          'circulation' => [
            'class' => 'backend\modules\circulation\Circulation',
        ],
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
