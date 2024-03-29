<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'bower_components/metisMenu/dist/metisMenu.min.css',
        'dist/css/sb-admin-2.css',
        'bower_components/font-awesome/css/font-awesome.min.css'
    ];
    public $js = [
        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/metisMenu/dist/metisMenu.min.js',
        'dist/js/sb-admin-2.js',
        'bower_components/bootstrap/dist/js/bootstrap.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
