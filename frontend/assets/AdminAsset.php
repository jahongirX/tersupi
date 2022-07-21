<?php


namespace frontend\assets;


use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "admin/bootstrap/dist/css/bootstrap.min.css",
        "admin/css/animate.css",
        "admin/css/style.css",
        "admin/css/colors/red.css"
    ];

    public $js = [
        "admin/bootstrap/dist/js/bootstrap.min.js",
        "admin/js/jquery.slimscroll.js",
        "admin/js/waves.js",
        "admin/js/sidebarmenu.js",
        "admin/js/custom.js",
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
