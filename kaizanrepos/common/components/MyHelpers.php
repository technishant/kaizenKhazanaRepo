<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\components;

use yii\helpers\StringHelper;
use yii\helpers\Html;
class MyHelpers {

    function trim_by_words($text, $length = 10) {
        return StringHelper::truncate($text, $length);
    }

    public function getUrl($includeLanguage = true) {
        $prefix = ($includeLanguage) ? "{$this->language}/" : '';

        return Url::to("{$prefix}{$this->alias}");
    }

    public function randomizeBackgroundImage() {
        $banners = array(
            'banner-1.jpg',
            'banner-2.jpg',
            'banner-3.jpg',
            'banner-4.jpg',
            'banner-5.jpg',
            'banner-6.jpg',
            'banner-7.jpg',
        );
        return $banners[rand(0, 6)];
    }
    
    public function WebText($content) {        
        return nl2br(Html::encode($content));
    }
    
    public function WebTextCaps($content) {        
        return nl2br(Html::encode(ucwords($content)));
    }
    
    public function WebTextFirstCap($content) {        
        return nl2br(Html::encode(ucfirst($content)));
    }
}
