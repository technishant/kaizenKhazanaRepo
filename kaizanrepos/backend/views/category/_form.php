<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>
<?php 
//if(Yii::$app->controller->action->id!='updatecategorylevel2'){
   // $form = ActiveForm::begin();
//}
if(Yii::$app->controller->action->id=='create'){
$form = ActiveForm::begin(['action' => 'createroot']); 
}
else{
$form = ActiveForm::begin();     
}
?>
<div class="box box-default">
    <!-- /.box-header -->
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
                <div class="form-group">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
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
</div>
<?php ActiveForm::end(); ?>