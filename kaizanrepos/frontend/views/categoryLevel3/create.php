<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CategoryLevel3 */

$this->title = 'Create Category Level3';
$this->params['breadcrumbs'][] = ['label' => 'Category Level3s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-level3-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
