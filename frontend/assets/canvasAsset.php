<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Canvas frontend application asset bundle.
 */
class canvasAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'canvas-theme\canvas-css\css\bootstrap.css',
        'canvas-theme\canvas-css\style.css',
        'canvas-theme\canvas-css\css\dark.css',
        'canvas-theme\canvas-css\css\font-icons.css',
        'canvas-theme\canvas-css\css\animate.css', 
        'canvas-theme\canvas-css\css\magnific-popup.css',
        'canvas-theme\canvas-css\css\components\select-boxes.css',
        'canvas-theme\canvas-css\css\responsive.css',
        'canvas-theme\canvas-css\css\fonts.css',
        'canvas-theme\canvas-css\test.css', #form upload img -- add recepies
        
    ];

    public $cssOptions = [
        'type'=>'text/css'
    ];  

    public $js = [
        'canvas-theme\canvas-js\js\jquery.js',
        'canvas-theme\canvas-js\js\can-plugin.js',
        'canvas-theme\canvas-js\js\components\select-boxes.js',
        'canvas-theme\canvas-js\js\components\selectsplitter.js',
        'canvas-theme\canvas-js\js\can-function.js',
        'canvas-theme\canvas-js\js\jquery.gmap.js',
        'canvas-theme\canvas-js\test.js',
        'canvas-theme\canvas-js\upload.js', #form upload img -- add recepies
        'canvas-theme\canvas-js\logout.js',
    ];
    public $depends = [
        #'yii\web\YiiAsset',
        #'yii\bootstrap\BootstrapAsset',
        #'yii\web\JqueryAsset',
    ];
}
