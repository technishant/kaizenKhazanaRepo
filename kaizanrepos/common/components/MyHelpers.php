<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\components;
use yii\helpers\StringHelper;
class MyHelpers
{
    public static function hello($name) {
        return "Hello $name";
    }
    
    function trim_by_words($text, $length = 10) {
        return StringHelper::truncate($text,$length);        
    }

    
    public function getUrl($includeLanguage = true)
    {
        $prefix = ($includeLanguage) ? "{$this->language}/" : '';

        return Url::to("{$prefix}{$this->alias}");
    }
}