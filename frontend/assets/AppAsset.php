<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{    
    
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "https://fonts.googleapis.com",
        "https://fonts.gstatic.com",
        "../../css2?family=Roboto:wght@400;500;700;900&display=swap",
        "css/vendor/fontawesome-all.min.css",
        "css/vendor/edumall-icon.css",
        "css/vendor/bootstrap.min.css",
        "css/plugins/aos.css",
        "css/plugins/swiper-bundle.min.css",
        "css/plugins/perfect-scrollbar.css",
        "css/plugins/jquery.powertip.min.css",
        "css/plugins/glightbox.min.css",
        "css/plugins/flatpickr.min.css",
        "css/plugins/ion.rangeSlider.min.css",
        "css/plugins/select2.min.css",
        "css/style.css?v=01072022",
    ];

    public $js = [

        "js/vendor/modernizr-3.11.7.min.js",
//        "js/vendor/jquery-3.6.0.min.js",
        "js/vendor/jquery-migrate-3.3.2.min.js",
        "js/vendor/bootstrap.bundle.min.js",
        "js/plugins/aos.js",
        "js/plugins/parallax.js",
        "js/plugins/swiper-bundle.min.js",
        "js/plugins/perfect-scrollbar.min.js",
        "js/plugins/jquery.powertip.min.js",
        "js/plugins/nice-select.min.js",
        "js/plugins/glightbox.min.js",
        "js/plugins/jquery.sticky-kit.min.js",
        "js/plugins/imagesloaded.pkgd.min.js",
        "js/plugins/masonry.pkgd.min.js",
        "js/plugins/flatpickr.js",
        "js/plugins/range-slider.js",
        "js/plugins/select2.min.js",
        "js/main.js?v=04072022",

    ];

      public $depends = [
//          'yii\web\yiiAsset',
          'yii\web\JqueryAsset'
      ];

}
