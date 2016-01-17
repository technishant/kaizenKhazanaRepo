<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;
use yii\web\AssetBundle;
class AppAsset extends AssetBundle
{ 
    public $sourcePath = '@webroot/admin-lte/';
    public $css = [
        'bootstrap/css/bootstrap.min.css',
       // 'plugins/font-awesome/css/font-awesome.min.css',
        'dist/css/skins/skin-blue.css',
        'dist/css/AdminLTE.css',
        'plugins/iCheck/square/blue.css',
    ];
    public $js = [
           // 'plugins/jQuery/jQuery-2.1.4.min.js',
            'bootstrap/js/bootstrap.min.js',
            'plugins/iCheck/icheck.min.js',
            'plugins/ckeditor/ckeditor.js',
          //  'dist/js/satusoftware_icheck.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}