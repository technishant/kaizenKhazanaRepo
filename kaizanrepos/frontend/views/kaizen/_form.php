<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use common\components\MyHelpers;
use yii\helpers\ArrayHelper;
use yii\web\View;
//use kartik\widgets\ActiveForm; // or yii\widgets\ActiveForm
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\Kaizen */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Kaizen Post';
?>

<div class="registerBox clearfix">
    <div class="container">
        <div class="row">
            <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['class' => 'register clearfix', 'enctype' => 'multipart/form-data']]); ?>

            <div class="col-sm-12 clearfix">
                <span class="text-center"><i class="fa fa-lock"></i>Kaizen Form</span>
                <hr>
            </div>
            <div class="col-sm-12 clearfix">
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
            <div class="col-sm-12 clearfix">
                <div class="form-group">
                    <?php
                    $rootCategory = \frontend\models\Category::find()->roots()->all();
                    $listData = ArrayHelper::map($rootCategory, 'id', 'name');
                    echo $form->field($model, 'category')->dropDownList(
                            $listData, ['onchange' => 'getSubCat(this.value,"' . Yii::$app->homeUrl . '")', 'prompt' => 'Select']
                    );
                    ?>
                </div>

                <div class="form-group" id="subcat">
                </div>
                <div class="form-group" id="subcatlevel2">
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'attachmenttype')->radioList(array('video' => 'Video', 'image' => 'Image', 'pdf' => 'Pdf'), ['itemOptions' => ['id' => 'attachmenttype']]); ?>

                </div>
                <div class="form-group">    
                    <?php
                    // if(Yii::$app->controller->action->id=='update' && $model->attachmenttype=='image'){
//          $imgBeforName=$model->attachmentbefore;
//     echo Html::img(Yii::$app->params['kzAttachmentsShowUrl'].$imgBeforName);
//      } 
                    ?>
                    <?= $form->field($model, 'upload_file')->fileInput() ?>
                </div>
                <div class="form-group">        
                    <?= $form->field($model, 'upload_file1')->fileInput() ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'subject')->textarea(['rows' => 6]) ?>
                </div>
                <div class="form-group">

                    <?= $form->field($model, 'processarea')->textarea(['rows' => 6]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'currrentstage')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'tangiblebenifits')->textarea(['rows' => 6]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'intengiblebenifits')->textarea(['rows' => 6]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'costsaving')->textInput() ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'implementationdate')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd', 'options' => [ 'class' => 'form-control']]); ?>
                </div>
                <!--    <div class="form-group">
                <?php // $form->field($model, 'postedby')->textInput() ?>
                </div>
                    <div class="form-group">
                <?php // $form->field($model, 'posteddate')->textInput() ?>
                </div>-->
                <div class="form-group">
                    <?= $form->field($model, 'suggestedby')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary btn-lg' : 'btn btn-primary btn-lg']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJs('
  function getSubCat(catval,basepath) {
    $.ajax({
    type     :"POST",
    cache    : false,
    data     :"catid="+catval+"&subcat="+1,
    url      : basepath+"kaizen/categorychild",
    success  : function(response) {
        if(response){
        $("#subcat").html(response);
        }
        else{
        $("#subcat").html("");
        $("#subcatlevel2").html("");
        }
    }
    });
  }', View::POS_END);
$this->registerJs('
  function getSubCatlevel2(catval,basepath) {
    $.ajax({
    type     :"POST",
    cache    : false,
    data     :"catid="+catval+"&subcat="+0,
    url      : basepath+"kaizen/categorychild",
    success  : function(response) {
        $("#subcatlevel2").html(response);
    }
    });
  }', View::POS_END);
?>
    