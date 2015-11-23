<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CategoryLevel2 */

$this->title = 'Create Category Level2';
$this->params['breadcrumbs'][] = ['label' => 'Category Level2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-level2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
