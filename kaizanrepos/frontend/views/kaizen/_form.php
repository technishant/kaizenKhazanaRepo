<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use common\components\MyHelpers;
use yii\helpers\ArrayHelper;
use yii\web\View;
?>

<div class="registerBox clearfix">
    <div class="container">
        <div class="row">
    <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['class' => 'register clearfix','enctype' => 'multipart/form-data']]); ?>

    <div class="col-sm-12 clearfix">
        <span class="text-center"><i class="fa fa-lock"></i><?= $this->title = 'Kaizen Form'; ?></span>     
    <hr>
    </div>
    <div class="col-sm-12 clearfix">
        <div class="form-group">
        <?php if(Yii::$app->session->hasFlash('successKz')) { ?>
        <div class="alert alert-success">
        <?php echo Yii::$app->session->getFlash('successKz'); ?>
        </div>
        <?php } 
        if(Yii::$app->session->hasFlash('errorKz')) {
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
    $rootCategory= \frontend\models\Category::find()->roots()->all();
    $listData=ArrayHelper::map($rootCategory,'id','name');
    echo $form->field($model, 'category')->dropDownList(
            $listData,             
            ['onchange'=>'getSubCat(this.value,"'.Yii::$app->homeUrl.'")','prompt'=>'Select']
            );
    ?>
    </div>
    
    <div class="form-group" id="subcat">
    </div>
    <div class="form-group" id="subcatlevel2">
    </div>
    <div class="form-group">
         <?= $form->field($model, 'attachmenttype')->radioList(array('video'=>'Video','image'=>'Image','pdf'=>'Pdf'),['itemOptions' => ['id' =>'attachmenttype']]); ?>
    
    </div>
    <div class="form-group">    
      <?php // if(Yii::$app->controller->action->id=='update' && $model->attachmenttype=='image'){
//          $imgBeforName=$model->attachmentbefore;
//     echo Html::img(Yii::$app->params['kzAttachmentsShowUrl'].$imgBeforName);
//      } ?>
      <?= $form->field($model, 'attachmentbefore')->fileInput() ?>
    </div>
    <div class="form-group">        
      <?= $form->field($model, 'attachmentafter')->fileInput() ?>
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
    <?= $form->field($model, 'implementationdate')->widget(\yii\jui\DatePicker::classname(),['dateFormat' => 'yyyy-MM-dd' ,'options'=>[ 'class'=>'form-control']]); ?>
</div>
<!--    <div class="form-group">
    <?php // $form->field($model, 'postedby')->textInput() ?>
</div>
    <div class="form-group">
    <?php  // $form->field($model, 'posteddate')->textInput() ?>
</div>-->
    <div class="form-group">
    <?= $form->field($model, 'suggestedby')->textInput(['maxlength' => true]) ?>
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary btn-lg submitBtn' : 'btn btn-primary btn-lg submitBtn']) ?>
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

$this->registerJs("
 jQuery(document ).on('change','#kaizen-attachmentbefore' ,function (e) {   
        var attachmenttype=jQuery('input[type=radio]:checked').val();
        if(!attachmenttype || attachmenttype=='')
        {
            bootbox.alert('Please select attachment type first.');
            jQuery('#kaizen-attachmentbefore').parent('div').removeClass('has-kzsuccess');
            jQuery('#kaizen-attachmentbefore').parent('div').addClass('has-kzerror');
            jQuery('#kaizen-attachmentbefore').replaceWith(jQuery('#kaizen-attachmentbefore').clone());            
            return false;
        }
        var imageextension = new Array('jpg','jpeg','png');
        var videoextension = ['mp4','3gp','mov','m4v'];
        var pdfextension = ['pdf'];
        var avatar = jQuery('#kaizen-attachmentbefore').val();        
        var extension = avatar.split('.').pop().toLowerCase();
        if(avatar.length < 1) {
            avatarok = 0;
        }
        else if ((attachmenttype=='image' && jQuery.inArray(extension,imageextension)=='-1') || (attachmenttype=='video' && jQuery.inArray(extension,videoextension)=='-1') || (attachmenttype=='pdf' && jQuery.inArray(extension,pdfextension)=='-1')){
            avatarok = 0;
            bootbox.alert('Invalid file type for attachment type '+attachmenttype+'.');
            jQuery('#kaizen-attachmentbefore').parent('div').removeClass('has-kzsuccess');
            jQuery('#kaizen-attachmentbefore').parent('div').addClass('has-kzerror');
            jQuery('#kaizen-attachmentbefore').replaceWith(jQuery('#kaizen-attachmentbefore').clone());            
            return false;
        }
        else {
            avatarok = 1;
            jQuery('#kaizen-attachmentbefore').parents('div').addClass('has-kzsuccess');
            jQuery('#kaizen-attachmentbefore').parents('div').removeClass('has-kzerror');
        }        
    });",View::POS_LOAD);

$this->registerJs("
 jQuery(document ).on('change','#kaizen-attachmentafter' ,function (e) {   
        var attachmenttype=jQuery('input[type=radio]:checked').val();
        if(!attachmenttype || attachmenttype=='')
        {
            bootbox.alert('Please select attachment type first.');    
            jQuery('#kaizen-attachmentafter').parent('div').removeClass('has-kzsuccess');
            jQuery('#kaizen-attachmentafter').parent('div').addClass('has-kzerror');
            jQuery('#kaizen-attachmentafter').replaceWith(jQuery('#kaizen-attachmentafter').clone());
            return false;
        }
        var imageextension = new Array('jpg','jpeg','png');
        var videoextension = ['mp4','3gp','mov','m4v'];
        var pdfextension = ['pdf'];
        var avatar = jQuery('#kaizen-attachmentafter').val();        
        var extension = avatar.split('.').pop().toLowerCase();
        if(avatar.length < 1) {
            avatarok = 0;
        }
        else if ((attachmenttype=='image' && jQuery.inArray(extension,imageextension)=='-1') || (attachmenttype=='video' && jQuery.inArray(extension,videoextension)=='-1') || (attachmenttype=='pdf' && jQuery.inArray(extension,pdfextension)=='-1')){
            avatarok = 0;
            jQuery('#kaizen-attachmentafter').parent('div').removeClass('has-kzsuccess');
            jQuery('#kaizen-attachmentafter').parent('div').addClass('has-kzerror');
            bootbox.alert('Invalid file type for attachment type '+attachmenttype+'.');
            jQuery('#kaizen-attachmentafter').replaceWith(jQuery('#kaizen-attachmentafter').clone());            
            return false;
        }
        else {
            avatarok = 1;
            jQuery('#kaizen-attachmentafter').parents('div').addClass('has-kzsuccess');
            jQuery('#kaizen-attachmentafter').parents('div').removeClass('has-kzerror');
        }        
    });",View::POS_LOAD);

$this->registerJs("
 jQuery(document ).on('click','.submitBtn' ,function (e) {   
        var attachmenttype=jQuery('input[type=radio]:checked').val();
        var avatar0 = jQuery('#kaizen-attachmentbefore').val();  
        var avatar1 = jQuery('#kaizen-attachmentafter').val();           
        var imageextension = new Array('jpg','jpeg','png');
        var videoextension = ['mp4','3gp','mov','m4v'];
        var pdfextension = ['pdf'];
              
        var extensionFile1 = avatar0.split('.').pop().toLowerCase();
        var extensionFile2 = avatar1.split('.').pop().toLowerCase();
        if(avatar0.length < 1) {
            avatarok = 0;
            bootbox.alert('Please upload kaizen first attachment file.');    
            jQuery('#kaizen-attachmentbefore').parent('div').removeClass('has-kzsuccess');
            jQuery('#kaizen-attachmentbefore').parent('div').addClass('has-kzerror');
            jQuery('#kaizen-attachmentbefore').replaceWith(jQuery('#kaizen-attachmentbefore').clone());
            return false;
        }
        else if(avatar1.length < 1){
            bootbox.alert('Please upload kaizen second attachment file.');    
            jQuery('#kaizen-attachmentafter').parent('div').removeClass('has-kzsuccess');
            jQuery('#kaizen-attachmentafter').parent('div').addClass('has-kzerror');
            jQuery('#kaizen-attachmentafter').replaceWith(jQuery('#kaizen-attachmentafter').clone());
            return false;        
        }
        else if ((attachmenttype=='image' && jQuery.inArray(extensionFile1,imageextension)=='-1') || (attachmenttype=='video' && jQuery.inArray(extensionFile1,videoextension)=='-1') || (attachmenttype=='pdf' && jQuery.inArray(extensionFile1,pdfextension)=='-1')){
            avatarok = 0;
            jQuery('#kaizen-attachmentbefore').parent('div').removeClass('has-kzsuccess');
            jQuery('#kaizen-attachmentbefore').parent('div').addClass('has-kzerror');
            bootbox.alert('Invalid file type for attachment type '+attachmenttype+'.');
            jQuery('#kaizen-attachmentafter').replaceWith(jQuery('#kaizen-attachmentafter').clone());            
            return false;
        }
        else if ((attachmenttype=='image' && jQuery.inArray(extensionFile2,imageextension)=='-1') || (attachmenttype=='video' && jQuery.inArray(extensionFile2,videoextension)=='-1') || (attachmenttype=='pdf' && jQuery.inArray(extensionFile2,pdfextension)=='-1')){
            avatarok = 0;
            jQuery('#kaizen-attachmentbefore').parent('div').removeClass('has-kzsuccess');
            jQuery('#kaizen-attachmentbefore').parent('div').addClass('has-kzerror');
            bootbox.alert('Invalid file type for attachment type '+attachmenttype+'.');
            jQuery('#kaizen-attachmentafter').replaceWith(jQuery('#kaizen-attachmentafter').clone());            
            return false;
        }
        else {
            avatarok = 1;
            jQuery('#kaizen-attachmentbefore').parents('div').addClass('has-kzsuccess');
            jQuery('#kaizen-attachmentbefore').parents('div').removeClass('has-kzerror');
            jQuery('#kaizen-attachmentafter').parents('div').addClass('has-kzsuccess');
            jQuery('#kaizen-attachmentafter').parents('div').removeClass('has-kzerror');
        }        
    });",View::POS_LOAD);