<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Category;
use yii\helpers\ArrayHelper;
use common\components\MyHelpers;

/* @var $this yii\web\View */
/* @var $model frontend\models\Enquiry */
/* @var $form yii\widgets\ActiveForm */
?>

<!--  / registerBox \ -->
<div class="registerBox clearfix" style='background-image: url("../../web/images/banners/<?= MyHelpers::randomizeBackgroundImage(); ?>")'>
    <div class="container">
        <div class="row">
            <?php $form = ActiveForm::begin(['options' => ['class' => 'register clearfix', 'style' => 'max-width: 700px']]); ?>

            <div class="col-sm-12 clearfix">
                <span class="text-center"><i class="fa fa-info-circle"></i><?= yii\bootstrap\Html::encode('Post a enquiry if you are unable to find the concerned kazien, video, audio or ebook.') ?></span>
                <hr>
            </div>

            <div class="col-sm-12 clearfix">
                <div class="form-group">
                    <?php if (Yii::$app->session->hasFlash('successEnquiry')): ?>
                        <div class="alert alert-success">
                            <?php echo Yii::$app->session->getFlash('successEnquiry'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <?=
                    $form->field($model, 'category_id', ['template' => "{label}\n<div class='col-sm-9'>{input}\n{error}</div>"])->label('Select Category', ['class' => 'col-sm-3 control-label'])->dropDownList(
                            ArrayHelper::map(Category::find()->roots()->all(), 'id', 'name'), ['onchange' => 'getSubCat(this.value,"' . Yii::$app->homeUrl . '")', 'prompt' => 'Select']);
                    ?>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Type of info required</label>
                    <div class="col-sm-9">
                        <div class="radio">
                            <label>
                                <input type="radio" name="Enquiry[type]" value="0" checked>
                                Kaizan
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="Enquiry[type]" value="1">
                                Business Idea
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="Enquiry[type]" value="2">
                                User guide
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="Enquiry[type]" value="3">
                                Book
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="Enquiry[type]" value="4">
                                All
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?=
                    $form->field($model, 'description', ['template' => "{label}\n<div class='col-sm-9'>{input}\n{error}</div>"])->label('Relevent Info For search', ['class' => 'col-sm-3 control-label'])->textarea(['class' => 'form-control', 'rows' => '4', 'cols' => '4']);
                    ?>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 mob-none control-label">&nbsp;</label>
                    <div class="col-sm-9">
                        <button class="btn btn-primary btn-lg">Save</button>
                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<!--  \ registerBox / -->


<footer class="footerBox">
    <div class="ul-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul>
                        <li><a href="#" class="color-white">Existing user ? Login to Kaizan Khanano</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>