<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CategoryLevel2 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Category Level2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-level2-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'level_1_id',
            'name',
            'description',
            'created',
        ],
    ]) ?>

</div>
