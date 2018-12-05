<?php

namespace app\assets;

use yii\web\AssetBundle;

class EchartsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower-asset/echarts/dist';
    public $baseUrl = '@vendor/bower-asset/echarts/dist';
    public $js = [
        'echarts.js',
        'echarts.min.js',
    ];
}