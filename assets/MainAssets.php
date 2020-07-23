<?php

namespace app\assets;

use yii\web\AssetBundle;

class MainAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'css/base.css',
        'css/vendor.css',

    ];
    public $js = [
        'js/jquery-3.2.1.min.js',
        'js/modernizr.js',
        'js/main.js',
        'js/plugins.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
