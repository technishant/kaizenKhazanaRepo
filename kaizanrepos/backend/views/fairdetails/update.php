<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FairDetails */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Fair Details',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fair Details'), 'url' => ['index']];
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
