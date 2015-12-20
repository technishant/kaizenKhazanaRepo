<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Country;

$this->title = 'Signup :: Kaizen Kahazana';
?>

<!--  / registerBox \ -->
<div class="registerBox clearfix">
    <div class="container">
        <div class="row">
            <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['class' => 'register clearfix']]); ?>

            <div class="col-sm-12 clearfix">
                <span class="text-center"><i class="fa fa-lock"></i><?= yii\bootstrap\Html::encode('Post a Kaizan and avail unlimited benefits. No credit card required') ?></span>
                <hr>
            </div>

            <div class="col-sm-12 clearfix">
                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'first_name', ['template' => "<div class='form-group'>\n{input}\n{error}</div>"])->label('')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'First Name']); ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'last_name', ['template' => "<div class='form-group'>\n{input}\n{error}</div>"])->label('')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Last Name']); ?> 
                    </div>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'email', ['template' => "<div class='form-group'>\n{input}\n{error}</div>"])->label('')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Email']); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'phone', ['template' => "<div class='form-group'>\n{input}\n{error}</div>"])->label('')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Phone Number']); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'password', ['template' => "<div class='form-group'>\n{input}\n{error}</div>"])->label('')->passwordInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Password']); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'country', ['template' => "<div class='form-group'>\n{input}\n{error}</div>"])->label('')->dropDownList(\yii\helpers\ArrayHelper::map(Country::find()->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => 'Select country']); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'state', ['template' => "<div class='form-group'>\n{input}\n{error}</div>"])->label('')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'State']); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'postcode', ['template' => "<div class='form-group'>\n{input}\n{error}</div>"])->label('')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Postcode']); ?>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> I have read and I agree to the Terms of Use and Privacy Policy
                    </label>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-success btn-lg">Get Started</button>
                </div>

                <?= yii\authclient\widgets\AuthChoice::widget(['baseAuthUrl' => ['site/auth']]); ?>

            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<!--  \ registerBox / -->

<?= $this->render('_footer'); ?>