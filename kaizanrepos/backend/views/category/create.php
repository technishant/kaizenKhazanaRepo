<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Category */

$this->title = Yii::t('app', 'Create Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content-header">
    <h3>
        <?= Html::encode($this->title) ?>
    </h3>

</section>
<section class="content">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</section>
