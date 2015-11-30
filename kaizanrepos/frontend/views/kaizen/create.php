<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Kaizen */

$this->title = Yii::t('app', 'Create Kaizen');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kaizens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kaizen-create">

<!--    <h1><?php // Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
