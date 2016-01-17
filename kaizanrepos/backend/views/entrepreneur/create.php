<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Entrepreneur */

$this->title = Yii::t('app', 'Create Entrepreneur');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entrepreneurs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content-header">
    <h1>
        <?= Html::encode($this->title) ?>
    </h1>
</section>
<section class="content entrepreneur-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</section>
