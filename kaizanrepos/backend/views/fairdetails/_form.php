<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use FFMpeg\FFProbe\DataMapping\Format;

/* @var $this yii\web\View */
/* @var $model common\models\FairDetails */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <div class="box-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php if (Yii::$app->session->hasFlash('successKz')) { ?>
                                <div class="alert alert-success">
                                    <?php echo Yii::$app->session->getFlash('successKz'); ?>
                                </div>
                                <?php
                            }
                            if (Yii::$app->session->hasFlash('errorKz')) {
                                ?>
                                <div class="alert alert-danger">
                                    <?php echo Yii::$app->session->getFlash('errorKz'); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php
                            if (!$model->isNewRecord) {
                                echo '<label class="control-label">Current Video:</label>' . 'frontend/uploads/fairvideos/' . $model->attachment;
                            }
                            ?>
                            <?= $form->field($model, 'attachmentfile')->fileInput(); ?>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>