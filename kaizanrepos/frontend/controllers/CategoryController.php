<?php

namespace frontend\controllers;
use frontend\models\Category;

class CategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $category1 = Category::findOne(['name' => 'Category1']);
        $subCategory1 = new Category(['name' => 'Category1.1']);
        $subCategory1->prependTo($category1);
    }

}
