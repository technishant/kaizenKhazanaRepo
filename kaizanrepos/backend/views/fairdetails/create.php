<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FairDetails */

$this->title = Yii::t('app', 'Create Fair');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fair Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content-header">
    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

</section>
<section class="content">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</section>
