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

	public static function trim_by_words($text, $length = 10, $appendDot = false) {
		if ($appendDot) {
			return StringHelper::truncate($text, $length, $appendDot);
		} else {
			return StringHelper::truncate($text, $length);
		}
	}

	public static function getUrl($includeLanguage = true) {
		$prefix = ($includeLanguage) ? "{$this->language}/" : '';

		return Url::to("{$prefix}{$this->alias}");
	}

	public static function randomizeBackgroundImage() {
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

	public static function WebText($content) {
		return nl2br(Html::decode($content));
	}

	public static function WebTextCaps($content) {
		return nl2br(Html::decode(ucwords($content)));
	}

	public static function WebTextFirstCap($content) {
		return nl2br(Html::decode(ucfirst($content)));
	}

	public static function getParentTree($childId) {
		$catObj = \frontend\models\Category::findOne(['id' => $childId]);
		$parents = $catObj->parents()->all();
		$parentCatArray = array();
		foreach ($parents as $key => $parent) {
			array_push($parentCatArray, $parent->name);
		}
		array_push($parentCatArray, $catObj->name);
		return $parentCatArray;
	}

}
