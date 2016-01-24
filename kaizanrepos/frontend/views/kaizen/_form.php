<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use common\components\MyHelpers;
use yii\helpers\ArrayHelper;
use yii\web\View;
use common\models\Tags;
?>

<div class="registerBox clearfix" style='background-image: url("../../images/banners/<?= MyHelpers::randomizeBackgroundImage(); ?>")'>
    <div class="container">
        <div class="row">
            <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['class' => 'register clearfix', 'enctype' => 'multipart/form-data']]); ?>
            <div class="col-sm-12 clearfix">
                <span class="text-center"><i class="fa fa-lock"></i><?= $this->title = 'Kaizen Form'; ?></span>     
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
                    <?= $form->field($model, 'type')->dropDownList([0 => 'Kaizen', 1 => 'Image', 2 => 'Video', 3 => 'E-Book'], ['id' => 'kaizen-type-dropdown']); ?>
                </div>
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
                <div class="form-group showFields hidden">    
                    <?= $form->field($model, 'otherAttachmentFile')->fileInput() ?>
                </div>
                <div class="form-group hideFields">
                    <?= $form->field($model, 'attachmenttype')->radioList(array('video' => 'Video', 'image' => 'Image', 'pdf' => 'Pdf')); ?>
                </div>
            </div>
            
            <div class="col-sm-12 clearfix">
                <div class="form-group">
                    <?= $form->field($model, 'tags')->checkboxList(ArrayHelper::map(Tags::find()->all(), 'id', 'tag_name')); ?> 
                </div>
            </div>
            
            <div class="col-sm-6 clearfix">
                <div class="form-group">
                    <?= $form->field($model, 'name')->textInput(); ?>
                </div>

                <div class="form-group hideFields">
                    <?= $form->field($model, 'implemented_by')->textInput() ?>
                </div>

                <div class="form-group hideFields">
                    <?= $form->field($model, 'problem_observed')->textarea(['rows' => 6]) ?>
                </div>

                <div class="form-group hideFields">
                    <img src="<?php echo Yii::$app->request->baseUrl . '/images/thumbnail.jpg' ?>" width="300px" height="184px" id="beforeImageThumb">
                </div>

                <div class="form-group hideFields">    
                    <?= $form->field($model, 'kzfilebefore')->fileInput() ?>
                </div>

                <div class="form-group hideFields">
                    <?= $form->field($model, 'tangiblebenifits')->textarea(['rows' => 6]) ?>
                </div>

            </div>

            <div class="col-sm-6 clearfix">
                <div class="form-group showFields hidden">
                    <?= $form->field($model, 'subject')->textInput(['rows' => 6]) ?>
                </div>

                <div class="form-group hideFields">
                    <?= $form->field($model, 'processarea')->textInput(['rows' => 6]) ?>
                </div>

                <div class="form-group hideFields">
                    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="form-group hideFields">
                    <?= $form->field($model, 'action_taken')->textarea(['rows' => 6]) ?>
                </div>

                <div class="form-group hideFields">
                    <img src="<?php echo Yii::$app->request->baseUrl . '/images/thumbnail.jpg' ?>" width="300px" height="184px" id="afterImageThumb">
                </div>

                <div class="form-group hideFields">        
                    <?= $form->field($model, 'kzfileafter')->fileInput() ?>
                </div>

                <div class="form-group hideFields">
                    <?= $form->field($model, 'intengiblebenifits')->textarea(['rows' => 6]) ?>
                </div>
            </div>

            <div class="col-sm-12 clearfix">
                <div class="form-group showFields hidden">
                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                </div>
            </div>
            <div class="col-sm-12 clearfix">
                <div class="form-group" align="center">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary btn-lg submitBtn' : 'btn btn-primary btn-lg submitBtn']) ?>
                    <a style="margin-left: 20px;" href="<?= Yii::$app->homeUrl; ?>"><?= Html::button(Yii::t('app', 'Cancel'), ['class' => 'btn btn-default btn-lg submitBtn']) ?></a>
                </div>
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
 jQuery(document ).on('change','#kaizen-kzfilebefore' ,function (e) {   
        var attachmenttype=jQuery('#kaizen-attachmenttype input[type=radio]:checked').val();
        var imageextension = new Array('jpg','jpeg','png');
        var videoextension = ['mp4','3gp','mov','m4v'];
        var pdfextension = ['pdf'];
        var avatar = jQuery('#kaizen-kzfilebefore').val();        
        var extension = avatar.split('.').pop().toLowerCase();
        if(avatar.length < 1) {
            avatarok = 0;
        }
        else if ((attachmenttype=='image' && jQuery.inArray(extension,imageextension)=='-1') || (attachmenttype=='video' && jQuery.inArray(extension,videoextension)=='-1') || (attachmenttype=='pdf' && jQuery.inArray(extension,pdfextension)=='-1')){
            avatarok = 0;
            bootbox.alert('Invalid file type for attachment type '+attachmenttype+'.');
            jQuery('#kaizen-kzfilebefore').parent('div').removeClass('has-kzsuccess');
            jQuery('#kaizen-kzfilebefore').parent('div').addClass('has-kzerror');
            jQuery('#kaizen-kzfilebefore').replaceWith(jQuery('#kaizen-kzfilebefore').clone());            
            return false;
        }
        else {
            avatarok = 1;
            jQuery('#kaizen-kzfilebefore').parents('div').addClass('has-kzsuccess');
            jQuery('#kaizen-kzfilebefore').parents('div').removeClass('has-kzerror');
        }        
    });", View::POS_LOAD);

$this->registerJs("
 jQuery(document ).on('change','#kaizen-kzfileafter' ,function (e) {   
        var attachmenttype=jQuery('#kaizen-attachmenttype input[type=radio]:checked').val();
        if(!attachmenttype || attachmenttype=='')
        {
            bootbox.alert('Please select attachment type first.');
            jQuery('#kaizen-kzfileafter').parent('div').removeClass('has-kzsuccess');
            jQuery('#kaizen-kzfileafter').parent('div').addClass('has-kzerror');
            jQuery('#kaizen-kzfileafter').replaceWith(jQuery('#kaizen-kzfileafter').clone());
            return false;
        }
        var imageextension = new Array('jpg','jpeg','png');
        var videoextension = ['mp4','3gp','mov','m4v'];
        var pdfextension = ['pdf'];
        var avatar = jQuery('#kaizen-kzfileafter').val();        
        var extension = avatar.split('.').pop().toLowerCase();
        if(avatar.length < 1) {
            avatarok = 0;
        }
        else if ((attachmenttype=='image' && jQuery.inArray(extension,imageextension)=='-1') || (attachmenttype=='video' && jQuery.inArray(extension,videoextension)=='-1') || (attachmenttype=='pdf' && jQuery.inArray(extension,pdfextension)=='-1')){
            avatarok = 0;
            jQuery('#kaizen-kzfileafter').parent('div').removeClass('has-kzsuccess');
            jQuery('#kaizen-kzfileafter').parent('div').addClass('has-kzerror');
            bootbox.alert('Invalid file type for attachment type '+attachmenttype+'.');
            jQuery('#kaizen-kzfileafter').replaceWith(jQuery('#kaizen-kzfileafter').clone());            
            return false;
        }
        else {
            avatarok = 1;
            jQuery('#kaizen-kzfileafter').parents('div').addClass('has-kzsuccess');
            jQuery('#kaizen-kzfileafter').parents('div').removeClass('has-kzerror');
        }        
    });", View::POS_LOAD);

$this->registerJs("
 jQuery(document ).on('click','.submitBtn' ,function (e) {   
        var attachmenttype=jQuery('#kaizen-attachmenttype input[type=radio]:checked').val();
        var avatar0 = jQuery('#kaizen-kzfilebefore').val();  
        var avatar1 = jQuery('#kaizen-kzfileafter').val();
        var type = jQuery('input:radio[name=" + 'Kaizen[type]' + "]:checked').val();
        console.log(type);
        var imageextension = new Array('jpg','jpeg','png');
        var videoextension = ['mp4','3gp','mov','m4v'];
        var pdfextension = ['pdf'];
              
        var extensionFile1 = avatar0.split('.').pop().toLowerCase();
        var extensionFile2 = avatar1.split('.').pop().toLowerCase();
        if(avatar0.length < 1 && type == 0) {
            avatarok = 0;
            bootbox.alert('Please upload kaizen first attachment file.');    
            jQuery('#kaizen-kzfilebefore').parent('div').removeClass('has-kzsuccess');
            jQuery('#kaizen-kzfilebefore').parent('div').addClass('has-kzerror');
            jQuery('#kaizen-kzfilebefore').replaceWith(jQuery('#kaizen-kzfilebefore').clone());
            return false;
        }
        else if(avatar1.length < 1 && type == 0){
            bootbox.alert('Please upload kaizen second attachment file.');    
            jQuery('#kaizen-kzfileafter').parent('div').removeClass('has-kzsuccess');
            jQuery('#kaizen-kzfileafter').parent('div').addClass('has-kzerror');
            jQuery('#kaizen-kzfileafter').replaceWith(jQuery('#kaizen-kzfileafter').clone());
            return false;        
        }
        else if (type == 0 && (attachmenttype=='image' && jQuery.inArray(extensionFile1,imageextension)=='-1') || (attachmenttype=='video' && jQuery.inArray(extensionFile1,videoextension)=='-1') || (attachmenttype=='pdf' && jQuery.inArray(extensionFile1,pdfextension)=='-1')){
            avatarok = 0;
            jQuery('#kaizen-kzfilebefore').parent('div').removeClass('has-kzsuccess');
            jQuery('#kaizen-kzfilebefore').parent('div').addClass('has-kzerror');
            bootbox.alert('Invalid file type for attachment type '+attachmenttype+'.');
            jQuery('#kaizen-kzfileafter').replaceWith(jQuery('#kaizen-kzfileafter').clone());            
            return false;
        }
        else if (type == 0 && (attachmenttype=='image' && jQuery.inArray(extensionFile2,imageextension)=='-1') || (attachmenttype=='video' && jQuery.inArray(extensionFile2,videoextension)=='-1') || (attachmenttype=='pdf' && jQuery.inArray(extensionFile2,pdfextension)=='-1')){
            avatarok = 0;
            jQuery('#kaizen-kzfilebefore').parent('div').removeClass('has-kzsuccess');
            jQuery('#kaizen-kzfilebefore').parent('div').addClass('has-kzerror');
            bootbox.alert('Invalid file type for attachment type '+attachmenttype+'.');
            jQuery('#kaizen-kzfileafter').replaceWith(jQuery('#kaizen-kzfileafter').clone());            
            return false;
        }
        else {
            avatarok = 1;
            jQuery('#kaizen-kzfilebefore').parents('div').addClass('has-kzsuccess');
            jQuery('#kaizen-kzfilebefore').parents('div').removeClass('has-kzerror');
            jQuery('#kaizen-kzfileafter').parents('div').addClass('has-kzsuccess');
            jQuery('#kaizen-kzfileafter').parents('div').removeClass('has-kzerror');
        }        
    });", View::POS_LOAD);
