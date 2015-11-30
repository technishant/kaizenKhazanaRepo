<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\KaizenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kaizen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'subject') ?>

    <?= $form->field($model, 'processarea') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'company') ?>

    <?php // echo $form->field($model, 'currrentstage') ?>

    <?php // echo $form->field($model, 'mode') ?>

    <?php // echo $form->field($model, 'tangiblebenifits') ?>

    <?php // echo $form->field($model, 'intengiblebenifits') ?>

    <?php // echo $form->field($model, 'costsaving') ?>

    <?php // echo $form->field($model, 'implementationdate') ?>

    <?php // echo $form->field($model, 'postedby') ?>

    <?php // echo $form->field($model, 'posteddate') ?>

    <?php // echo $form->field($model, 'suggestedby') ?>

    <?php // echo $form->field($model, 'approvedby') ?>

    <?php // echo $form->field($model, 'recordstatus') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
