<?php

namespace backend\assets;

use yii\web\AssetBundle;

class EchartsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower-asset/echarts/dist';
    public $baseUrl = '@vendor/bower-asset/echarts/dist';
    public $js = [
        'echarts-en.js',
        'echarts-en.min.js',
    ];
}
