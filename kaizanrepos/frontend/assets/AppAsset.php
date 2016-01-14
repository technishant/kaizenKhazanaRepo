<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/master.css?version=12121',
        'css/custom-css.css',
        //'css/fonts.css',
        //'css/global.css',
        //'css/owl.carousel.css',
        //'css/global-flag.css',
        //'css/global-saffron.css'
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/owl.carousel.js',
        'js/custom.js',        
        'js/respond.min.js',
        'js/html5shiv.min.js',
        'js/bootbox.min.js',
        'js/kaizen.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
