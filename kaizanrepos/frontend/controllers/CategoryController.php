<?php

namespace frontend\controllers;

use frontend\models\Category;

class CategoryController extends \yii\web\Controller {

    public function actionIndex() {
        $category = new Category(['name' => 'Category9']);
        $category->makeRoot();
        $category = new Category(['name' => 'Category10']);
        $category->makeRoot();
    }

}
