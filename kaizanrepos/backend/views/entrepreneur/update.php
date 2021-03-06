<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Entrepreneur */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Entrepreneur',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entrepreneurs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<section class="content-header">
    <h1>
        <?= Html::encode(ucwords($this->title)) ?>
    </h1>

</section>
<section class="content">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</section>>
